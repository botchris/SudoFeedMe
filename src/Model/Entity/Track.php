<?php
/**
 * Licensed under The GPL-3.0 License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @since    2.0.0
 * @author   Christopher Castro <chris@quickapps.es>
 * @link     http://www.quickappscms.org
 * @license  http://opensource.org/licenses/gpl-3.0.html GPL-3.0 License
 */
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Represents a single "track" within "tracks" table.
 */
class Track extends Entity
{

    /**
     * Gets the color of this track based  type.
     *
     * @return string HEX color excluding the "#"
     */
    protected function _getColor()
    {
        switch ((int)$this->get('track_type')) {
            case 1:
                return '223AFF';
            case 2:
                return '980294';
            case 3:
                return 'FF0000';
            default:
                return '00AA16';
        }
    }
}