<?php
/**
 * @package     Thumbs
 * @subpackage  tpl_seb_thumbs
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
$items = $cck->getItems();
$count = count($items);
$id    = !empty($cck->id_class) ? trim($cck->id_class) : 'generic-slideshow';

// -- Render
if (!empty($items)) : ?>
<div id="<?php echo $id; ?>" class="carousel-slide" data-ride="carousel">
	<ol class="carousel-indicators">
  <?php for($i = 0; $i < $count; $i++) : ?>
    <li data-target="#<?php echo $id; ?>" data-slide-to="<?php echo $i ?>"<?php echo $i == 0 ? 'class="active"' : null;?>></li>
  <?php endfor; ?>
  </ol>
	<div class="carousel-inner">
	<?php foreach ($items as $key => $item) : ?>
		<div class="item">
			<?php echo $cck->renderItem($key); ?>
		</div>
	<?php endforeach; ?>
	</div>
	<?php if($count > 1): ?>
  <a class="left carousel-control" href="#<?php echo $id; ?>" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
  <a class="right carousel-control" href="#<?php echo $id; ?>" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
<?php endif; ?>
</div>
<?php endif;

// -- Finalize
$cck->finalize(); ?>