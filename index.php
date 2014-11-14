<?php
/**
 * @package     Tabs
 * @subpackage  tpl_seb_tabs
 * @copyright   Copyright (C) 2014 Rene Bentes Pinto, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see http://www.gnu.org/licenses/gpl-2.0.html
 */

// No direct access.
defined('_JEXEC') or die('Restricted access!');

// -- Initialize
require_once dirname(__FILE__) . '/config.php';

$cck = CCK_Rendering::getInstance($this->template);
if ($cck->initialize() === false)
	return;

// -- Prepare
$items     = $cck->getItems();
$count     = count($items);
$id        = !empty($cck->id_class) ? trim($cck->id_class) : 'genericTab';
$i         = 0;
$positions = $cck->getPositions();


// -- Render
if (!empty($items)) : ?>
  <ul id="<?php echo $id; ?>" class="nav nav-tabs<?php echo $cck->getStyleParam('class') ? ' ' . trim($cck->getStyleParam('class')) : null; ?>" role="tablist">
  <?php foreach ($items as $key => $item) : ?>
    <li role="presentation"<?php echo $i == 0 ? ' class="active"' : null; ?>>
      <a href="#<?php echo $key; ?>" id="<?php echo $key; ?>-tab" role="tab" data-toggle="tab" aria-controls="<?php echo $key; ?>" aria-expanded="<?php echo $i == 0 ? 'true' : false; ?>">
      <?php $fieldnames = $cck->getFields('tab', '', false);
      foreach ($fieldnames as $fieldname) : ?>
        <?php echo $item->renderField($fieldname); ?>
      <?php endforeach; ?>
      </a>
    </li>
    <?php $i++;
  endforeach; ?>
  </ul>
  <?php $i = 0; ?>
	<div id="<?php echo $id; ?>Content" class="tab-content<?php echo $cck->getStyleParam('class_content') ? ' ' . trim($cck->getStyleParam('class_content')) : null; ?>">
  <?php foreach ($items as $key => $item) : ?>
    <div role="tabpanel" class="tab-pane fade<?php echo $i == 0 ? ' active in' : null; ?>" id="<?php echo $key; ?>" aria-labelledby="<?php echo $key; ?>-tab">
    <?php $fieldnames = $cck->getFields('content', '', false);
    foreach ($fieldnames as $fieldname) : ?>
      <?php echo $item->renderField($fieldname); ?>
    <?php endforeach; ?>
    </div>
    <?php $i++;
  endforeach; ?>
  </div>
<?php endif;

// -- Finalize
$cck->finalize(); ?>