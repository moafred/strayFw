<?php

namespace ErrantWorks\StrayFw\Render;

/**
 * JSON render class, useful for AJAX requests.
 *
 * @author Nekith <nekith@errant-works.com>
 */
class RenderJson implements RenderInterface
{
    use ArgsTrait;

    /**
     * Construct render with base arguments.
     *
     * @param array $args base arguments
     */
    public function __construct(array $args = array())
    {
        $this->args = $args;
    }

    /**
     * Return the generated display.
     *
     * @return string content
     */
    public function render()
    {
        header('Content-type: application/json');
        if (STRAY_ENV === 'development') {
            return json_encode($this->args, JSON_PRETTY_PRINT);
        }

        return json_encode($this->args);
    }
}
