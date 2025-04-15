<?php
class ControllerExtensionPaymentpayflex extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/payment/payflex');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting('payflex', $this->request->post);
			$this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=payment', true));
		}

		if($this->config->get('config_ssl')) {
			$data['text_payflex'] = sprintf($this->language->get('text_payflex'), HTTPS_CATALOG);
		} else {
			$data['text_payflex'] = sprintf($this->language->get('text_payflex'), HTTP_CATALOG);
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['pf_store_url'] = HTTPS_CATALOG;

		//////////////////////////////////////////////////////////////////////
		// Error copying
		if (isset($this->error['username'])) {
			$data['error_username'] = $this->error['username'];
		} else {
			$data['error_username'] = '';
		}

		if (isset($this->error['password'])) {
			$data['error_password'] = $this->error['password'];
		} else {
			$data['error_password'] = '';
		}

		if (isset($this->error['reference'])) {
			$data['error_reference'] = $this->error['reference'];
		} else {
			$data['error_reference'] = '';
		}

	  //////////////////////////////////////////////////////////////////////
		// Breadcrumb
		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('marketplace/extension', 'token=' . $this->session->data['token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('payment/payflex', 'token=' . $this->session->data['token'], 'SSL')
		);
		$data['heading_title'] = $this->language->get('heading_title');
		//////////////////////////////////////////////////////////////////////
		// Actions?
		$data['action'] = $this->url->link('extension/payment/payflex', 'token=' . $this->session->data['token'], 'SSL');
		$data['cancel'] = $this->url->link('marketplace/extension', 'token=' . $this->session->data['token'] . '&type=payment', true);

		//////////////////////////////////////////////////////////////////////
		// Page Data
        
        if (isset($this->request->post['payflex_sort_order'])) {
			$data['payflex_sort_order'] = $this->request->post['payflex_sort_order'];
		} else {
			$data['payflex_sort_order'] = $this->config->get('payflex_sort_order');
		}

		if (isset($this->request->post['payflex_test'])) {
			$data['payflex_test'] = $this->request->post['payflex_test'];
		} else {
			$data['payflex_test'] = $this->config->get('payflex_test');
		}

		if (isset($this->request->post['payflex_order_status_id'])) {
			$data['payflex_order_status_id'] = $this->request->post['payflex_order_status_id'];
		} else {
			$data['payflex_order_status_id'] = $this->config->get('payflex_order_status_id');
		}

		if (isset($this->request->post['payflex_order_status_refunded_id'])) {
			$data['payflex_order_status_refunded_id'] = $this->request->post['payflex_order_status_refunded_id'];
		} else {
			$data['payflex_order_status_refunded_id'] = $this->config->get('payflex_order_status_refunded_id');
		}

		if (isset($this->request->post['payflex_order_status_auth_id'])) {
			$data['payflex_order_status_auth_id'] = $this->request->post['payflex_order_status_auth_id'];
		} else {
			$data['payflex_order_status_auth_id'] = $this->config->get('payflex_order_status_auth_id');
		}

		if (isset($this->request->post['payflex_username'])) {
			$data['payflex_username'] = $this->request->post['payflex_username'];
		} else {
			$data['payflex_username'] = $this->config->get('payflex_username');
		}

		if (isset($this->request->post['payflex_password'])) {
			$data['payflex_password'] = $this->request->post['payflex_password'];
		} else {
			$data['payflex_password'] = $this->config->get('payflex_password');
		}

		if (isset($this->request->post['payflex_order_status_success'])) {
			$data['payflex_order_status_success'] = $this->request->post['payflex_order_status_success'];
		} else {
			$data['payflex_order_status_success'] = $this->config->get('payflex_order_status_success');
		}

		if (isset($this->request->post['payflex_order_status_pending'])) {
		  $data['payflex_order_status_pending'] = $this->request->post['payflex_order_status_pending'];
		} else {
		  $data['payflex_order_status_pending'] = $this->config->get('payflex_order_status_pending');
		}

		if (isset($this->request->post['payflex_order_status_expired'])) {
		  $data['payflex_order_status_expired'] = $this->request->post['payflex_order_status_expired'];
		} else {
		  $data['payflex_order_status_expired'] = $this->config->get('payflex_order_status_expired');
		}

		if (isset($this->request->post['payflex_order_status_cancelled'])) {
		  $data['payflex_order_status_cancelled'] = $this->request->post['payflex_order_status_cancelled'];
		} else {
		  $data['payflex_order_status_cancelled'] = $this->config->get('payflex_order_status_cancelled');
		}

		if (isset($this->request->post['payflex_order_status_failed'])) {
		  $data['payflex_order_status_failed'] = $this->request->post['payflex_order_status_failed'];
		} else {
		  $data['payflex_order_status_failed'] = $this->config->get('payflex_order_status_failed');
		}

		// Cron Job Information Starts

		if (isset($this->request->post['payflex_cron_job_token'])) {
		  $data['payflex_cron_job_token'] = $this->request->post['payflex_cron_job_token'];
		} elseif ($this->config->get('payflex_cron_job_token')) {
		  $data['payflex_cron_job_token'] = $this->config->get('payflex_cron_job_token');
		} else {
		  $data['payflex_cron_job_token'] = sha1(uniqid(mt_rand(), 1));
		}
		$data['payflex_cron_job_url'] = HTTPS_CATALOG . 'index.php?route=extension/payment/payflex/cron&token=' . $data['payflex_cron_job_token'];

		if ($this->config->get('payflex_cron_job_last_run')) {
		  $data['payflex_cron_job_last_run'] = $this->config->get('payflex_cron_job_last_run');
		} else {
		  $data['payflex_cron_job_last_run'] = '';
		}


		// Cron Job Information Ends

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		/*if (isset($this->request->post['payflex_reference'])) {
			$data['payflex_reference'] = $this->request->post['payflex_reference'];
		} else {
			$data['payflex_reference'] = $this->config->get('payflex_reference');
		}*/

		if (isset($this->request->post['payflex_status'])) {
			$data['payflex_status'] = $this->request->post['payflex_status'];
		} else {
			$data['payflex_status'] = $this->config->get('payflex_status');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$data['text_plugin_version'] = $this->language->get('text_plugin_version');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_none'] = $this->language->get('text_none');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_authorisation'] = $this->language->get('text_authorisation');
		$data['text_all_zones'] = $this->language->get('text_all_zones');
		$data['text_sale'] = $this->language->get('text_sale');
		$data['text_transparent'] = $this->language->get('text_transparent');
		$data['text_iframe'] = $this->language->get('text_iframe');

		$data['entry_paymode'] = $this->language->get('entry_paymode');
		$data['entry_test'] = $this->language->get('entry_test');
		$data['entry_payment_type'] = $this->language->get('entry_payment_type');
		$data['entry_transaction'] = $this->language->get('entry_transaction');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_order_status_refund'] = $this->language->get('entry_order_status_refund');
		$data['entry_order_status_auth'] = $this->language->get('entry_order_status_auth');
		$data['entry_order_status_fraud'] = $this->language->get('entry_order_status_fraud');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_username'] = $this->language->get('entry_username');
		$data['entry_password'] = $this->language->get('entry_password');
		$data['entry_reference'] = $this->language->get('entry_reference');
		$data['entry_transaction_method'] = $this->language->get('entry_transaction_method');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_order_status_success'] = $this->language->get('entry_order_status_success');
		$data['entry_order_status_pending'] = $this->language->get('entry_order_status_pending');
		$data['entry_order_status_expired'] = $this->language->get('entry_order_status_expired');
		$data['entry_order_status_cancelled'] = $this->language->get('entry_order_status_cancelled');
		$data['entry_order_status_failed'] = $this->language->get('entry_order_status_failed');
		$data['entry_cron_job_token'] = $this->language->get('entry_cron_job_token');
		$data['entry_order_status_cancelled'] = $this->language->get('entry_order_status_cancelled');
		$data['entry_cron_job_url'] = $this->language->get('entry_cron_job_url');
		$data['entry_sort'] = $this->language->get('entry_sort');
		
		$data['help_testmode'] = $this->language->get('help_testmode');
		$data['help_username'] = $this->language->get('help_username');
		$data['help_password'] = $this->language->get('help_password');
		$data['help_reference'] = $this->language->get('help_reference');
		$data['help_transaction_method'] = $this->language->get('help_transaction_method');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		$data['tab_general'] = $this->language->get('tab_general');
		$data['help_cron_job_token'] = $this->language->get('help_cron_job_token');
		$data['help_cron_job_url'] = $this->language->get('help_cron_job_url');

		$this->response->setOutput($this->load->view('extension/payment/payflex', $data));
	}

	public function refund() {
	}

	private function validate() {

		if (!$this->user->hasPermission('modify', 'extension/payment/payflex')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['payflex_username']) {
			$this->error['username'] = $this->language->get('error_username');
		}
		if (!$this->request->post['payflex_password']) {
			$this->error['password'] = $this->language->get('error_password');
		}
		/*if (!$this->request->post['payflex_reference']) {
			$this->error['reference'] = $this->language->get('error_reference');
		}*/

		return !$this->error;
	}
}
