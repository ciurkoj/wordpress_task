<?php
/**
 * @package  SocialMediaPlugin
 */
namespace Includes\Base;

use Includes\Api\Widgets\MediaWidget;
use Includes\Base\BaseController;

/**
 *
 */
class WidgetController extends BaseController
{

    public function register()
    {

        $media_widget = new MediaWidget();

        $media_widget->register();
    }
}
