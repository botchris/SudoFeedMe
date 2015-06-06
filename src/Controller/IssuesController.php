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
        $this->loadModel('Issues');
        $issue = $this->Issues->newEntity($this->request->data());
        $this->Issues->save($issue);
        $this->redirect($this->referer());
    }

    public function view($id)
    {
        $this->loadModel('Issues');
        $issue = $this->Issues->get($id);
        $this->set(compact('issue'));
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function vote($id, $type)
    {
        $this->loadModel('Votes');
        $vote = $this->Votes->newEntity([
            'issue_id' => $id,
            'ip' => $this->request->clientIp(),
            'type' => ($type != 'solved' ? 'agree' : 'solved')
        ]);
        $this->Votes->save($vote);
        die('ok');
    }
}
