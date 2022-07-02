# Inline text field for Laravel Nova 4

A Laravel Nova field which allows updating texts inline.

Example:

```
InlineText::make('time')
    ->placeholder('##:##')
    ->rules('date_format:"H:i"')
    ->successMessage('The time has been updated!')
    ->help('hh:mm')
    ->resolveUsing(function ($value) {
        return Str::substr($value, 0, 5);
    }),
```