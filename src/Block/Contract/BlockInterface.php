<?php namespace Anomaly\BlocksModule\Block\Contract;

use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface BlockInterface
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
interface BlockInterface extends EntryInterface
{

    /**
     * Return the rendered block.
     *
     * @return string
     */
    public function render();

    /**
     * Get the extension.
     *
     * @return BlockExtension
     */
    public function getExtension();

    /**
     * Return the loaded extension.
     *
     * @return BlockExtension
     */
    public function extension();

    /**
     * Return a setting value.
     *
     * @param $key
     * @return null|FieldTypePresenter
     */
    public function setting($key);

    /**
     * Return a configuration value.
     *
     * @param $key
     * @return null|FieldTypePresenter
     */
    public function configuration($key);

    /**
     * Get the title.
     *
     * @return null|string
     */
    public function getTitle();

    /**
     * Get the related entry.
     *
     * @return null|EntryInterface
     */
    public function getEntry();

    /**
     * Get the related entry's ID.
     *
     * @return null|int
     */
    public function getEntryId();

    /**
     * Get the related area.
     *
     * @return null|EntryInterface
     */
    public function getArea();

    /**
     * Get the content.
     *
     * @return string
     */
    public function getContent();

    /**
     * Set the content.
     *
     * @param $content
     * @return $this
     */
    public function setContent($content);
}
