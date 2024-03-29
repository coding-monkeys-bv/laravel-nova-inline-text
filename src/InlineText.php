<?php

namespace CodingMonkeys\InlineText;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\Text;

class InlineText extends Text
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'inline-text';

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param  mixed  $resource
     * @param  string  $attribute
     * @return mixed
     */
    protected function resolveAttribute($resource, $attribute)
    {
        $this->setResourceId(data_get($resource, $resource->getKeyName()));

        return parent::resolveAttribute($resource, $attribute);
    }

    /**
     * Set success message.
     *
     * @param Closure|string $message
     * @return $this
     */
    public function successMessage($message = 'Successfully updated!')
    {
        return $this->withMeta(['successMessage' => $message]);
    }

    /**
     * Set resource ID.
     *
     * @param int $id
     * @return $this
     */
    protected function setResourceId($id)
    {
        return $this->withMeta([
            'id' => $id,
            'nova_path' => config('nova.path'),
        ]);
    }

    /**
     * Set field type.
     *
     * @param string $type
     * @return $this
     */
    public function type($type = 'text')
    {
        return $this->withMeta(['type' => $type]);
    }

    /**
     * Set minimum with of input.
     *
     * @param int $width
     * @return $this
     */
    public function minWidth($width = 100)
    {
        return $this->withMeta([
            'minWidth' => $width,
        ]);
    }
}
