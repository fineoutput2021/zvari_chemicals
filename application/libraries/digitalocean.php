<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * DigitalOcean CodeIgniter Library
 *
 * Original Author: 	Giacomo Tüfekci <giacomo.tuefekci@googlemail.com>
 * Additions: 			Remmelt Pit <remmelt@gmail.com>
 * Additions: 			Sean Fleming <smenus@me.com>
 * CodeIgniter Port: 	Jacob Tomlinson <jacob@jacobtomlinson.co.uk>
 *
 * Based on the DigitalOcean PHP Class by Giacomo Tüfekci
 *
 * Copyright (c): 2014 Jacob Tomlinson, all rights reserved
 * Version 0.1.0 - 2014-05-31 (Based on version 1.2.0 of the DigitalOcean PHP Class)
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * You may contact the author of the DigitalOcean CodeIgniter Library by e-mail at:
 * jacob@jacobtomlinson.co.uk
 *
 * The latest version of DigitalOcean PHP Class can be obtained from:
 * https://github.com/tuefekci/DigitalOcean-PHP-Class
 *
 * and the latest version of this port from:
 * https://github.com/killfall/codeigniter-digitalocean
 */
class DigitalOcean {

	/**
	 * Protect the CodeIgniter object variable
	 * @var object
	 */
	protected $ci;

	/**
	 * The API base url
	 */
	const API_URL = 'https://api.digitalocean.com';

	/**
	 * The Client ID as provided by Digital Ocean
	 * @var string
	 */
	private $clientId; // API - CLIENT ID

	/**
	 * The API key as provided by Digital Ocean
	 * @var string
	 */
	private $apiKey; // API - KEY

	/**
	 * External connection class to facilitate testing
	 * @var ApiConnector
	 */
	private $apiConnector;

	########################
	# Base Functions
	########################	

	/**
	 * Setter for the API connector class
	 * @param ApiConnector $apiConnector
	 */
	public function setApiConnector(ApiConnector $apiConnector) {
		$this->apiConnector = $apiConnector;
	}

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->ci =& get_instance();
		$this->ci->load->helper('apiconnector');

		$this->ci->config->load('digitalocean');
		$this->clientId = $this->ci->config->item('digitalocean_client_id');
		$this->apiKey = $this->ci->config->item('digitalocean_api_key');
	}

	/**
	 * Send command to API
	 * @param $action
	 * @return mixed
	 */
	private function connectTo($action) {
		$uri = DigitalOcean::API_URL . '/' . $action;
		$uri .= strpos($uri, '?') !== false ? '&' : '?';
		$uri .= 'client_id=' . $this->clientId . '&api_key=' . $this->apiKey;

		return json_decode(connectToApi($uri));
	}

	########################
	# Droplets
	########################

	/**
	 * Show All Active Droplets
	 * This method returns all active droplets that are currently running in your account. All available API information is presented for each droplet.
	 * @return mixed
	 */
	public function getDroplets() {
		return $this->connectTo('droplets/');
	}

	/**
	 * New Droplet
	 * This method returns full information for a specific droplet ID that is passed in the URL.
	 * @param string $name
	 * @param int $sizeId
	 * @param int $imageId
	 * @param int $regionId
	 * @return mixed
	 */
	public function newDroplet($name, $sizeId, $imageId, $regionId, $sshKeyIds = NULL) {
		return $this->connectTo('droplets/new?name=' . $name . '&size_id=' . $sizeId . '&image_id=' . $imageId . '&region_id=' . $regionId . 
			(is_null($sshKeyIds) ? '' : '&ssh_key_ids=' . $sshKeyIds));
	}

	/**
	 * Show Droplet
	 * This method returns full information for a specific droplet ID that is passed in the URL.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function showDroplet($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/');
	}

	/**
	 * Reboot Droplet
	 * This method allows you to reboot a droplet. This is the preferred method to use if a server is not responding.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function reboot($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/reboot/');
	}

	/**
	 * Power Cycle Droplet
	 * This method allows you to power cycle a droplet. This will turn off the droplet and then turn it back on.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function powerCycle($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/power_cycle/');
	}

	/**
	 * Shut Down Droplet
	 * This method allows you to shutdown a running droplet. The droplet will remain in your account.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function shutDown($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/shutdown/');
	}

	/**
	 * Power Off
	 * This method allows you to power off a running droplet. The droplet will remain in your account.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function powerOff($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/power_off/');
	}

	/**
	 * Power On
	 * This method allows you to power on a powered off droplet.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function powerOn($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/power_on/');
	}

	/**
	 * Reset Root Password
	 * This method will reset the root password for a droplet. Please be aware that this will reboot the droplet to allow resetting the password.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function resetRootPassword($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/password_reset/');
	}

	/**
	 * Resize Droplet
	 * This method allows you to resize a specific droplet to a different size. This will affect the number of processors and memory allocated to the droplet.
	 * @param int $dropletId
	 * @param int $sizeId
	 * @return mixed
	 */
	public function resizeDroplet($dropletId, $sizeId) {
		return $this->connectTo('droplets/' . $dropletId . '/resize/?size_id=' . $sizeId);
	}

	/**
	 * Take a Snapshot
	 * This method allows you to resize a specific droplet to a different size. This will affect the number of processors and memory allocated to the droplet.
	 * @param int $dropletId
	 * @param string $name
	 * @return mixed
	 */
	public function takeASnapshot($dropletId, $name = NULL) {
		return $this->connectTo('droplets/' . $dropletId . '/snapshot/' . (is_null($name) ? '' : '?name=' . $name));
	}

	/**
	 * Restore Droplet
	 * This method allows you to resize a specific droplet to a different size. This will affect the number of processors and memory allocated to the droplet.
	 * @param int $dropletId
	 * @param int $imageId
	 * @return mixed
	 */
	public function restore($dropletId, $imageId) {
		return $this->connectTo('droplets/' . $dropletId . '/restore/?image_id=' . $imageId);
	}

	/**
	 * Rebuild Droplet
	 * This method allows you to reinstall a droplet with a default image. This is useful if you want to start again but retain the same IP address for your droplet.
	 * @param int $dropletId
	 * @param int $imageId
	 * @return mixed
	 */
	public function rebuild($dropletId, $imageId) {
		return $this->connectTo('droplets/' . $dropletId . '/rebuild/?image_id=' . $imageId);
	}

	/**
	 * Enable Automatic Backups
	 * This method enables automatic backups which run in the background daily to backup your droplet's data.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function enableBackups($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/enable_backups/');
	}

	/**
	 * Disable Automatic Backups
	 * This method disables automatic backups from running to backup your droplet's data.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function disableBackups($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/disable_backups/');
	}

	/**
	 * Rename Droplet
	 * This method renames the droplet to the specified name.
	 * @param int $dropletId
	 * @param string $name
	 * @return mixed
	 */
	//public function rename($dropletId, $name) {
	public function renames($dropletId, $name) {
		return $this->connectTo('droplets/' . $dropletId . '/rename/?name=' . $name);
	}

	/**
	 * Destroy Droplet
	 * This method destroys one of your droplets - this is irreversible.
	 * @param int $dropletId
	 * @return mixed
	 */
	public function destroy($dropletId) {
		return $this->connectTo('droplets/' . $dropletId . '/destroy/');
	}

	/**
	 * Show Event
	 * This method returns full information for a specific event ID that is passed in the URL.
	 * @param int $eventtId
	 * @return mixed
	 */

	public function showEvent($eventId) {
		return $this->connectTo('events/' . $eventId);
	}

	########################
	# Regions
	########################

	/**
	 * All Regions
	 * This method will return all the available regions within the Digital Ocean cloud.
	 * @return mixed
	 */
	public function getRegions() {
		$data = $this->connectTo('regions/');

		$return = array();
		foreach ($data->regions as $value) {
			$return[$value->id] = $value;
		}
		return $return;
	}

	########################
	# Images
	########################	

	/**
	 * All Images
	 * This method returns all the available images that can be accessed by your client ID. You will have access to all public images by default, and any snapshots or backups that you have created in your own account.
	 * @param string $filter
	 * @return mixed
	 */
	// public function getImages($filter = 'global') {
	public function getImages($filter = 'my_images') {

		$data = $this->connectTo('images/?filter=' . $filter);

		$return = array();
		foreach ($data->images as $value) {
			$return[$value->id] = $value;
		}
		return $return;
	}

	/**
	 * Show Image
	 * This method displays the attributes of an image.
	 * @param int $imageId
	 * @return mixed
	 */
	public function showImage($imageId) {
		return $this->connectTo('images/' . $imageId . '/');
	}

	/**
	 * Destroy Image
	 * This method allows you to destroy an image. There is no way to restore a deleted image so be careful and ensure your data is properly backed up.
	 * @param int $imageId
	 * @return mixed
	 */
	public function destroyImage($imageId) {
		return $this->connectTo('images/' . $imageId . '/destroy/');
	}

	/**
	 * Transfer Image
	 * This method allows you to transfer an image to a specified region.
	 * @param int $imageId
	 * @param int $regionId
	 * @return mixed
	 */
	public function transferImage($imageId, $regionId) {
		return $this->connectTo('images/' . $imageId . '/transfer/?region_id=' . $regionId);
	}

	########################
	# SSH Keys
	########################	

	/**
	 * All SSH Keys
	 * This method lists all the available public SSH keys in your account that can be added to a droplet.
	 * @return mixed
	 */
	public function getSSHKeys() {
		$data = $this->connectTo('ssh_keys/');

		$return = array();
		foreach ($data->ssh_keys as $value) {
			$return[$value->id] = $value;
		}
		return $return;
	}

	/**
	 * Add SSH Key
	 * This method allows you to add a new public SSH key to your account.
	 * @param int $sshKeyId
	 * @return mixed
	 */
	public function addSSHKey($sshKeyId, $name, $sshKeyPub) {
		return $this->connectTo('ssh_keys/' . $sshKeyId . '/new/?name=' . $name . '&ssh_key_pub=' . $sshKeyPub);
	}

	/**
	 * Show SSH Key
	 * This method shows a specific public SSH key in your account that can be added to a droplet.
	 * @param int $sshKeyId
	 * @return mixed
	 */
	public function showSSHKey($sshKeyId) {
		return $this->connectTo('ssh_keys/' . $sshKeyId . '/');
	}

	/**
	 * Edit SSH Key
	 * This method allows you to modify an existing public SSH key in your account.
	 * @param int $sshKeyId
	 * @return mixed
	 */
	public function editSSHKey($sshKeyId, $sshKeyPub) {
		return $this->connectTo('ssh_keys/' . $sshKeyId . '/edit/?ssh_key_pub=' . $sshKeyPub);
	}

	/**
	 * Destroy SSH Key
	 * This method will delete the SSH key from your account.
	 * @param int $sshKeyId
	 * @return mixed
	 */
	public function destroySSHKey($sshKeyId) {
		return $this->connectTo('ssh_keys/' . $sshKeyId . '/destroy/');
	}

	########################
	# Sizes
	########################	

	/**
	 * All Sizes
	 * This method returns all the available sizes that can be used to create a droplet.
	 * @return mixed
	 */
	public function getSizes() {
		$data = $this->connectTo('sizes/');

		$return = array();
		foreach ($data->sizes as $value) {
			$return[$value->id] = $value;
		}
		return $return;
	}

	########################
	# Domains
	########################	

	/**
	 * All Domains
	 * This method returns all of your current domains.
	 * @return mixed
	 */
	public function getDomains() {
		$data = $this->connectTo('domains/');

		$return = array();
		foreach ($data->domains as $value) {
			$return[$value->id] = $value;
		}
		return $return;
	}

	/**
	 * New Domain
	 * This method creates a new domain name with an A record for the specified [ip_address].
	 * @param string $name
	 * @param string $ipAddress
	 * @return mixed
	 */
	public function newDomain($name, $ipAddress) {
		return $this->connectTo('domains/new/?name=' . $name . '&ip_address=' . $ipAddress);
	}

	/**
	 * Show Domain
	 * This method returns the specified domain.
	 * @param string $domainId
	 * @return mixed
	 */
	public function showDomain($domainId) {
		return $this->connectTo('domains/' . $domainId . '/');
	}

	/**
	 * Destroy Domain
	 * This method deletes the specified domain.
	 * @param string $domainId
	 * @return mixed
	 */
	public function destroyDomain($domainId) {
		return $this->connectTo('domains/' . $domainId . '/destroy/');
	}

	/**
	 * All Domain Records
	 * This method returns all of your current domain records.
	 * @param string $domainId
	 * @return mixed
	 */
	public function getDomainRecords($domainId) {
		$data = $this->connectTo('domains/' . $domainId . '/records/');

		$return = array();
		foreach ($data->records as $value) {
			$return[$value->id] = $value;
		}
		return $return;
	}

	/**
	 * New Domain Record
	 * This method creates a new domain record for the specified domain.
	 * @param string $domainId
	 * @param string $recordType
	 * @param string $data
	 * @param string $name
	 * @param int $priority
	 * @param int $port
	 * @param int $weight
	 * @return mixed
	 */
	public function newDomainRecord($domainId, $recordType, $data, $name = NULL, $priority = NULL, $port = NULL, $weight = NULL) {
		return $this->connectTo('domains/' . $domainId . '/records/new/?record_type=' . $recordType . '&data=' . $data . 
			(is_null($name) ? '' : '&name=' . $name) . 
			(is_null($priority) ? '' : '&priority=' . $priority) . 
			(is_null($port) ? '' : '&port=' . $port) . 
			(is_null($weight) ? '' : '&weight=' . $weight));
	}

	/**
	 * Show Domain Record
	 * This method returns the specified domain record.
	 * @param string $domainId
	 * @param int $recordId
	 * @return mixed
	 */
	public function showDomainRecord($domainId, $recordId) {
		return $this->connectTo('domains/' . $domainId . '/records/' . $recordId . '/');
	}

	/**
	 * Edit Domain Record
	 * This method edits an existing domain record.
	 * @param string $domainId
	 * @param int $recordId
	 * @param string $recordType
	 * @param string $data
	 * @param string $name
	 * @param int $priority
	 * @param int $port
	 * @param int $weight
	 * @return mixed
	 */
	public function editDomainRecord($domainId, $recordId, $recordType, $data, $name = NULL, $priority = NULL, $port = NULL, $weight = NULL) {
		return $this->connectTo('domains/' . $domainId . '/records/' . $recordId . '/edit/?record_type=' . $recordType . '&data=' . $data . 
			(is_null($name) ? '' : '&name=' . $name) . 
			(is_null($priority) ? '' : '&priority=' . $priority) . 
			(is_null($port) ? '' : '&port=' . $port) . 
			(is_null($weight) ? '' : '&weight=' . $weight));
	}

	/**
	 * Destroy Domain Record
	 * This method deletes the specified domain record.
	 * @param string $domainId
	 * @param int $recordId
	 * @return mixed
	 */
	public function destroyDomainRecord($domainId, $recordId) {
		return $this->connectTo('domains/' . $domainId . '/records/' . $recordId . '/destroy/');
	}
	
	// show singele size
	
	public function showSize($sizeID,$sizes_data){
				     
				       foreach($sizes_data as $sz){
					        
					       if($sizeID==$sz->id){
						       return $sz;
						     break;
						   }
					   }
	}
	
	// show single region
	public function showRegion($regionID,$regions_data){
				     
				       foreach($regions_data as $sz){
					        
					       if($regionID==$sz->id){
						       return $sz;
						     break;
						   }
					   }
	}
	
	

}
