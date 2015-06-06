<?php
namespace App\Controller;

class IssuesController extends AppController
{

   public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function add()
    {
        $this->redirect($this->referer());
    }

    public function view($id)
    {
        $this->loadModel('Issues');
        $issue = $this->Issues->get($id);

        $this->set(compact('issue'));
        $this->RequestHandler->renderAs($this, 'json');
    }
}
