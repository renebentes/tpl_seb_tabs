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

// -- Render
if (!empty($items)) : ?>
<div id="<?php echo $cck->id_class ? trim($cck->id_class) : 'generic-slideshow'; ?>" class="carousel-slide" data-ride="carousel">
	<div class="carousel-inner">
	<?php foreach ($items as $key => $item) : ?>
		<div class="item">
			<?php echo $cck->renderItem($key); ?>
		</div>
	<?php endforeach; ?>
	</div>
</div>
<?php endif;

// -- Finalize
$cck->finalize(); ?>