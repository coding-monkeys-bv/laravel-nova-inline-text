# Inline text field for Laravel Nova 4

A Laravel Nova field which allows updating texts inline.

Installation:

```
composer require codingmonkeys/laravel-nova-inline-text
```

Example:

```
InlineText::make('time')
    ->type('time')
    ->placeholder('##:##')
    ->rules('date_format:"H:i"')
    ->successMessage('The time has been updated!')
    ->help('hh:mm')
    ->resolveUsing(function ($value) {
        return Str::substr($value, 0, 5);
    }),
```