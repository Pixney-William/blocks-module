<?php namespace Anomaly\BlocksModule\Block\Command;

use Anomaly\BlocksModule\Block\BlockExtension;
use Anomaly\BlocksModule\Block\Form\BlockInstanceFormBuilder;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Contracts\Config\Repository;

/**
 * Class ExtendFormSections
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ExtendFormSections
{

    /**
     * The block form builder.
     *
     * @var BlockInstanceFormBuilder
     */
    protected $builder;

    /**
     * The block extension.
     *
     * @var BlockExtension
     */
    protected $extension;

    /**
     * Create a new GetBlockStream instance.
     *
     * @param BlockInstanceFormBuilder $builder
     * @param BlockExtension           $extension
     */
    public function __construct(BlockInstanceFormBuilder $builder, BlockExtension $extension)
    {
        $this->builder   = $builder;
        $this->extension = $extension;
    }

    /**
     * Handle the command.
     *
     * @param Repository $config
     */
    public function handle(Repository $config)
    {
        $sections = $config->get($this->extension->getNamespace('sections'));

        if (!$sections) {

            $this->builder->setSections([]);

            $last = $this->builder
                ->getForms()
                ->last();

            $last->on(
                'built',
                function () {

                    $this->builder->setFields(['block_title']);

                    /* @var FormBuilder $builder */
                    foreach ($this->builder->getForms() as $key => $builder) {
                        $this->builder->addFields($builder->getFormFieldSlugs($key . '_'));
                    }
                }
            );

            return;
        }

        $this->builder->mergeSections($sections);
    }

}