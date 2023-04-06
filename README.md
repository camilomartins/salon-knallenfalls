# Repo für die Website des Freibad Mirke

Wordpress Theme for Salonknallenfalls in Wuppertal.
This theme needs ACF Pro.
### Software

TailPress is a minimal boilerplate theme for WordPress using [Tailwind CSS](https://tailwindcss.com/).

### General

TailPress uses the [Tailwind CLI](https://tailwindcss.com/docs/installation#using-tailwind-cli), [PostCSS](https://postcss.org) and [esbuild](https://esbuild.github.io).

You will find the editable CSS and Javascript files within the `/resources` folder.

Before you use your theme in production, make sure you run `npm run production`.

## NPM Scripts

There are several NPM scripts available. You'll find the full list in the `package.json` file onder "scripts". A script is executed through the terminal by running `npm run script-name`.

| Script     | Description                                                                    |
|------------|--------------------------------------------------------------------------------|
| production | Creates a production (minified) build of app.js, app.css and editor-style.css. |
| dev        | Creates a development build of app.js, app.css and editor-style.css.           |
| watch      | Runs several watch scripts concurrently.                                       |
| watch-sync | Runs several watch scripts concurrently and starts `browser-sync`.             |

## License

MIT. Please see the [License File](/LICENSE) for more information.