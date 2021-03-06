<?php

/*
 * This file is subject to the terms and conditions defined in
 * file 'LICENSE.txt', which is part of this source code package.
 */

/**
 * Description of Authors
 *
 * @author jobinrjohnson
 */
class Authors  extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->usermanager->is_admin_in()) {
            $this->session->set_flashdata('redir_url', current_url());
            redirect(base_url('authorize'));
            die();
        }
        $this->load->model('support');
    }

    public function index() {
        $this->load->view('author_s', array(
            'books' => $this->support->get_all_authors()
        ));
    }

    public function add() {
        $this->load->library('formlib', array('form_name' => 'authors'));
        $this->load->view('common_add', array(
            'redirurl' => base_url('authors'),
            'suburl' => base_url('authors/do_add')
        ));
    }

    public function edit($param = 0) {
        $this->load->library('formlib', array('form_name' => 'authors'));
        $this->load->view('common_edit', array(
            'item' => (int) $param,
            'redirurl' => base_url('authors'),
            'suburl' => base_url('authors/do_edit')
        ));
    }

    public function do_add() {
        $this->load->library('formlib', array('form_name' => 'authors'));
        $this->output->set_content_type('application/json');
        $data = array('status' => 0, 'msg' => "Unable to add");
        $v = $this->formlib->validate();
        if ($v === TRUE) {
            if ($this->support->add_author($this->formlib->get_db_add_data())) {
                $data['msg'] = 'Success category Added';
                $data['status'] = 1;
            }
        } else {
            $data['msg'] = $v;
        }
        $this->output->set_output(json_encode($data));
    }

    public function do_edit() {
        $this->load->library('formlib', array('form_name' => 'authors'));
        $this->output->set_content_type('application/json');
        $data = array('status' => 0, 'msg' => "Unable to update");
        $v = $this->formlib->validate_for_edit();
        if ($v === TRUE) {
            if ($this->support->edit_author($this->formlib->get_db_edit_data(), (int) $this->formlib->get_edit_primary_key())) {
                $data['msg'] = 'Success category updated';
                $data['status'] = 1;
            }
        } else {
            $data['msg'] = $v;
        }
        $this->output->set_output(json_encode($data));
    }

}
