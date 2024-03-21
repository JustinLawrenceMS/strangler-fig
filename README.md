
# JSON Dataset

This was a hobby website intended solely to demonstrate raw, procedural PHP as an interface for a Centers for Disease Control JSON dataset. Now it's a demo of strangler fig pattern using Laravel. You can see it deployed [here](https://json-dataset.herokuapp.com/).

The legacy app is wrapped in Laravel.  Index.php asks "Do you want the modernized app?" If the answer is yes, it routes to the Laravel wrapper.  If the answer is no, it routes to the Legacy App.  You can see it here:

<a target="_blank" href="https://json-dataset.herokuapp.com">Legacy App</a>

<a target="_blank" href="https://json-dataset.herokuapp.com/modern">Laravel Wrapper</a>

Now we can strangle this into a modern app.

## Usage
To use it, clone it and spin it up using Laravel Sail.

## Demo
Check out the live demo [here](https://json-dataset.herokuapp.com/).

## Contributing
Contributions are welcome! Feel free to open an issue or submit a pull request.

## Notes:

The branches are organized by stages of strangler fig, ie strangler_fig_part_1 etc.

In strangler fig part 2, public/legacy.php and public/index.php are important but were drowned out by noise from laravel repo init.
