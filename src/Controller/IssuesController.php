<?php
namespace App\Controller;

use Cake\Network\Exception\NotFoundException;

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
        $data = $this->request->data();
        $data['agree'] = 0;
        $data['solved'] = 0;
        $imageOk = true;

        if ($data['image']) {
            require_once APP . 'Lib/Upload/class.upload.php';
            $handler = new Upload($data['image']);
            if ($handler->uploaded) {
                $foo->Process(WWW_ROOT . '/files/issues/');
                $imageOk = $foo->processed;
            }
        }

        $issue = $this->Issues->newEntity($data);
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

        if ($this->Votes->save($vote)) {
            die('ok');
        }

        throw new NotFoundException('Voto rechazado');
    }
}
