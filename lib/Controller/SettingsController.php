<?php

/**
 * Nextcloud - U2F 2FA
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Christoph Wurst <christoph@winzerhof-wurst.at>
 * @copyright Christoph Wurst 2016
 */

namespace OCA\TwoFactor_U2F\Controller;

require_once(__DIR__ . '/../../vendor/yubico/u2flib-server/src/u2flib_server/U2F.php');

use OCA\TwoFactor_U2F\Service\U2FManager;
use OCP\AppFramework\Controller;
use OCP\IRequest;

class SettingsController extends Controller {

	/** @var U2FManager */
	private $manager;

	public function __construct($appName, IRequest $request, U2FManager $manager) {
		parent::__construct($appName, $request);
		$this->manager = $manager;
	}

	/**
	 * @NoAdminRequired
	 * @UseSession
	 */
	public function startRegister() {
		return $this->manager->startRegistration($user);
	}

	/**
	 * @NoAdminRequired
	 *
	 * @param string $registrationData
	 * @param string $clientData
	 */
	public function finishRegister($registrationData, $clientData) {
		$this->manager->finishRegistration($registrationData, $clientData);
	}

}
