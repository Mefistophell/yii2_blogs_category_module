<?php

namespace nill\blogs_category;

use yii\base\BootstrapInterface;

/**
 * Slider module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.
        $app->getUrlManager()->addRules(
            [
                'POST <_m:blogs_category>' => '<_m>/user/create',
                '<_m:blogs_category>' => '<_m>/default/index',
                '<_m:blogs_category>/<id:\d+>-<alias:[a-zA-Z0-9_-]{1,100}+>' => '<_m>/default/view',
            ]
        );

        // Add module I18N category.
        if (!isset($app->i18n->translations['nill/blogs_category']) && !isset($app->i18n->translations['nill/*'])) {
            $app->i18n->translations['nill/blogs_category'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@nill/blogs_category/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'nill/blogs_category' => 'blogs_category.php',
                ]
            ];
        }
    }
}
