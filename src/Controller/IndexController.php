<?php
namespace App\Controller;

class IndexController extends AppController
{

   public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
    }

    public function lines()
    {
        $this->loadModel('Tracks');
        $tracks = $this->Tracks
            ->find()
            ->contain(['Issues'])
            ->all();

        foreach ($tracks as $track) {
            $track->set('color', $track->get('color'));
            $track->set('shape', json_decode($track->get('shape')));
        }

        $this->set(compact('tracks'));
        $this->RequestHandler->renderAs($this, 'json');
    }
}
