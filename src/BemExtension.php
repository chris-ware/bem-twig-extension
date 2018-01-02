<?php

namespace Bem\Twig;


class BemExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('bem',
                function ($context, $base_class, $modifiers = array(), $blockname = '', $extra = array()) {
                    $classes = [];

                    // If using a blockname to override default class.
                    if ($blockname) {
                        // Set blockname class.
                        $classes[] = $blockname . '__' . $base_class;

                        // Set blockname--modifier classes for each modifier.
                        if (isset($modifiers) && is_array($modifiers)) {
                            foreach ($modifiers as $modifier) {
                                $classes[] = $blockname . '__' . $base_class . '--' . $modifier;
                            };
                        }
                    } // If not overriding base class.
                    else {
                        // Set base class.
                        $classes[] = $base_class;
                        // Set base--modifier class for each modifier.
                        if (isset($modifiers) && is_array($modifiers)) {
                            foreach ($modifiers as $modifier) {
                                $classes[] = $base_class . '--' . $modifier;
                            };
                        }
                    }

                    // If extra non-BEM classes are added.
                    if (isset($extra) && is_array($extra)) {
                        foreach ($extra as $extra_class) {
                            $classes[] = $extra_class;
                        };
                    }

                    $attributes = 'class="' . implode(' ', $classes) . '"';
                    return $attributes;

                }, array('needs_context' => true, 'is_safe' => array('html')))
        );
    }

    /**
     * Returns the name of the Twig Extension
     *
     * @return string
     */
    public function getName()
    {
        return 'bem_twig_extension';
    }
}

