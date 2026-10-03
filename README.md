# Integrated-project

A small PHP and MySQL news site called "The Gaming Nest" (the name used in the page headers and footers). Stories are stored in a database with an author, a category and a location, and the front page lays a selection of them out in a magazine-style grid. Each story opens on its own page with a comment box underneath.

There are no tests, no build step and no dependencies other than PHP and MySQL/MariaDB.

## Stack

- PHP, using PDO with the MySQL driver. The dump was exported from phpMyAdmin on MariaDB 10.4.28 with PHP 8.2.4 (see the header of `news.sql`).
- MySQL / MariaDB, database name `news`.
- Plain HTML, CSS and a small amount of vanilla JavaScript. No framework.
- Fonts: Poppins and Open Sans from Google Fonts (loaded from the web, so the layout needs a connection to look right).
- `css/all.min.css` is Font Awesome Free 6.2.0, but no page uses any of its icons.
- `.vscode/settings.json` only sets the Live Server port to 5501. Live Server does not run PHP, so it is not useful for this project.

## Running it

1. Install PHP with the `pdo_mysql` extension and a MySQL or MariaDB server. XAMPP covers both.
2. Create an empty database named `news`. `news.sql` has no `CREATE DATABASE` or `USE` line, so the database has to exist and be selected before importing:

   ```
   mysql -u root -e "CREATE DATABASE news CHARACTER SET utf8mb4"
   mysql -u root news < news.sql
   ```

   (or create `news` and use the Import tab in phpMyAdmin)
3. `db.php` connects to `localhost`, database `news`, user `root`, with a password that is hardcoded in the file. Edit the values in `db.php` if the local MySQL setup differs.
4. Serve the folder. With XAMPP, put it under `htdocs` and open `index.php`. With the built-in server:

   ```
   php -S localhost:8000
   ```

   then open `http://localhost:8000/index.php`.

The pages that load stylesheets (`index.php`, `single.php`) request `CSS/...` while the folder is named `css`. That works on Windows and macOS, where paths are case-insensitive, and silently loses most of the styling on Linux. Renaming the folder to `CSS` or changing the links fixes it. Separately, `index.php` links `CSS/allmin.css`, which does not exist (the file is `css/all.min.css`); nothing on that page needs it.

## Files

| File | What it does |
| --- | --- |
| `index.php` | Front page. Loads stories and prints them in several panels. Each headline links to `single.php?id=<story id>`. |
| `single.php` | One story, chosen by `?id=`. Shows image, headline, article HTML and author name, plus the comment box. Prints an error message and stops if `id` is missing or the story does not exist. Only accepts GET. |
| `story.php` | `Story` class. `findAll`, `findByAuthor`, `findByCategory`, `findByLocation`, `findById`, plus `save` and `delete`. The `find*` methods take an options array (`limit`, `offset`, `order`). |
| `author.php` | `Author` class (`findAll`, `findById`, `save`, `delete`). |
| `category.php` | `Category` class, same methods. |
| `location.php` | `Location` class, same methods. |
| `db.php` | `DB` class that opens and closes the PDO connection. |
| `script.js` | Comment box behaviour on `single.php`. |
| `news.sql` | Schema and seed data. |
| `indexold.php` | Earlier version of the front page, see below. |
| `css/` | `reset.css`, `grid.css` (12 column grid with `width-N` classes), `style.css`, `main.css`, `header.css`, `footer.css`, `fonts.css`, `single.css`, `all.min.css`. |
| `images/` | Story images. |
| `anonymous.jpg`, `user1.jpg`, `like.png`, `share.png` | Avatars and icons used by the comment box. |

`author.php`, `category.php`, `location.php` and `story.php` are model classes only. There are no pages that list stories by author, category or location, and nothing calls `save()` or `delete()`, so stories can only be added or changed in the database directly.

### index.php versus indexold.php

`indexold.php` is the first version of the front page. It loads the stories for one location (id 8) and prints each with its category, headline, author, location and the first 200 characters of the article. It uses `css/` in lowercase and `all.min.css`, so it renders correctly on Linux. Nothing links to it. `index.php` replaced it with the Gaming Nest layout.

## How it works

`index.php` makes several `Story::findBy...` calls with hardcoded ids, limits and offsets (category 1, 2, 3, 4 and 5 in different panels), then loops over each result set in HTML. Article text is cut with `substr()` for the previews, and author names come from `Author::findById()`. The header navigation (Technology, Gaming, Movies, Editorial, Business, Celebrity) and the footer items are plain text, not links. "Editorial" has no matching row in the `categories` table.

`single.php` reads `$_GET["id"]`, loads that story and prints it. The article column holds HTML (`<p>` tags), which is output as is.

Each model method opens its own PDO connection through `DB` (exceptions on errors, native prepared statements) and closes it in a `finally` block.

### Comment box

`script.js` enables the Publish button once the comment field is non-empty. On click it builds a comment block from the name field and the text, picks `anonymous.jpg` if the name is "Anonymous" and `user1.jpg` otherwise, appends it to the page and updates the comment counter. Comments live only in the page and are gone on reload. There is no PHP or database side to them. The like and share images next to each comment are not wired to anything. The "privacy policy" and "Terms of service" links under the box all point to the same YouTube URL.

## Database

Four InnoDB tables, utf8mb4.

- `authors`: `id`, `first_name`, `last_name`. 25 rows.
- `categories`: `id`, `name`. 5 rows: Technology, Gaming, Movies, Business, Celebrity.
- `locations`: `id`, `name`. 15 rows, made-up street and town names.
- `stories`: `id`, `headline`, `article` (text), `img_url` (path such as `images/12.jpg`), `author_id`, `category_id`, `location_id`, `created_at`, `updated_at`. 25 rows. The three `*_id` columns are foreign keys to the tables above.

## Known gaps

Security:

- The database password is hardcoded in `db.php`, which is committed, and the connection uses the `root` account. Moving these to environment variables or an untracked config file would avoid that.
- All queries that take values use prepared statements with bound parameters, and the only request input (`id` in `single.php`) goes through one. No SQL injection path was found.
- Output is not escaped. Headlines, article text, image URLs and author names are echoed with `<?= ?>` and no `htmlspecialchars()`. For the article that is deliberate (it stores HTML), but anything written into the database from user input would be rendered as markup. Today the database is only written by hand.
- `single.php` echoes the exception message on failure. A connection or SQL error will print its text, which can include host and user details.
- `script.js` inserts the comment name and text into the page with `innerHTML`, so markup typed into a comment is interpreted (affects only the person typing it, since comments are not stored).
- `ORDER BY :order` in `Story::find()` binds the column name as a value, so it would not sort by a column. No caller uses `order`.

Bugs and hygiene:

- `CSS/` versus `css/` casing, and the missing `CSS/allmin.css`, as described under Running it.
- `news.sql` references `images/3.jpg` and `images/6.jpeg`, which are not in the repo. `images/` has `3.avif` and `6.jfif` instead, so those two stories show broken images.
- Of the 79 files in `images/`, 57 are not referenced by `news.sql`. The folder is about 35 MB.
- `index.php` defines `$stories_all`, `$author` and `$location` but never prints them. Author names are fetched with two `Author::findById()` calls per story, each with a new connection.
- In `script.js` the comment template is missing the closing `>` on the avatar `<img>` and uses `<h1>` where `</h1>` is meant, so the generated markup is malformed.
- `single.php` calls `session_start()` but nothing uses the session.
- `news.sql` sets `AUTO_INCREMENT` to 8 for `categories` and 51 for `stories`, higher than the current row counts, so new ids will skip numbers.
- No `.gitignore`, no license file.

## History

17 commits between 4 March and 22 April 2024. March: a PHP loop for the stories, the database, and the first single story page. April: view pages, an author tag, the comment script and "read more" links.
