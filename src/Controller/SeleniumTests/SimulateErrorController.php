<?php
/**
 * Passbolt ~ Open source password manager for teams
 * Copyright (c) Passbolt SARL (https://www.passbolt.com)
 *
 * Licensed under GNU Affero General Public License version 3 of the or any later version.
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Passbolt SARL (https://www.passbolt.com)
 * @license       https://opensource.org/licenses/AGPL-3.0 AGPL License
 * @link          https://www.passbolt.com Passbolt(tm)
 * @since         2.0.0
 */
namespace App\Controller\SeleniumTests;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\NotFoundException;

class SimulateErrorController extends AppController
{
    /**
     * Before filter
     *
     * @param Event $event An Event instance
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(Event $event)
    {
        if (Configure::read('debug') && Configure::read('passbolt.selenium.active')) {
            $this->Auth->allow('error404');
            $this->Auth->allow('error403');
            $this->Auth->allow('error500');
        } else {
            throw new ForbiddenException();
        };

        return parent::beforeFilter($event);
    }

    /**
     * Simulate error 404
     *
     * @throws NotFoundException
     */
    public function error404()
    {
        throw new NotFoundException();
    }

    /**
     * Simulate error 404
     *
     * @throws ForbiddenException
     */
    public function error403()
    {
        throw new ForbiddenException();
    }

    /**
     * Simulate error 500
     *
     * @throws InternalErrorException
     */
    public function error500()
    {
        throw new InternalErrorException();
    }
}