<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * Currencies Controller
 *
 * @property \App\Model\Table\CurrenciesTable $Currencies
 */
class CurrenciesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Currencies->find();
        $currencies = $this->paginate($query);

        $this->set(compact('currencies'));
    }

    /**
     * View method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $currency = $this->Currencies->get($id, contain: []);
        $this->set(compact('currency'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $currency = $this->Currencies->newEmptyEntity();
        if ($this->request->is('post')) {
            $currency = $this->Currencies->patchEntity($currency, $this->request->getData());
            if ($this->Currencies->save($currency)) {
                $this->Flash->success(__('The currency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The currency could not be saved. Please, try again.'));
        }
        $this->set(compact('currency'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $currency = $this->Currencies->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $currency = $this->Currencies->patchEntity($currency, $this->request->getData());
            if ($this->Currencies->save($currency)) {
                $this->Flash->success(__('The currency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The currency could not be saved. Please, try again.'));
        }
        $this->set(compact('currency'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Currency id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $currency = $this->Currencies->get($id);
        if ($this->Currencies->delete($currency)) {
            $this->Flash->success(__('The currency has been deleted.'));
        } else {
            $this->Flash->error(__('The currency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // public function convert()
    // {
    //     if ($this->request->is('post')) {
    //         $data = $this->request->getData();
    //         $amount = floatval($data['amount']);
    //         $rate = floatval($data['rate']);
    //         $result = $amount * $rate;
    //         $this->set('result', $result);
    //     }
    // }

    public function convert()
    {
        // Fetch all currency codes from the database
        $currencies = $this->Currencies->find('list', [
            'keyField' => 'code',
            'valueField' => 'code'
        ])->toArray();

        // Initialize selected currency details and results as null
        $selectedCurrency = null;
        $buyResult = null;
        $sellResult = null;
        $x = null;
        $option = floatval($this->request->getData('option'));


        if ($this->request->is('post')) {
            $selectedCode = $this->request->getData('code');
            $amount = floatval($this->request->getData('amount'));

            // Fetch the details of the selected currency
            $selectedCurrency = $this->Currencies->find('all', [
                'conditions' => ['code' => $selectedCode]
            ])->first();

            if ($selectedCurrency && $option == '1') {
                // $buyResult = $amount * $selectedCurrency->buyat;
                $x = "I will receive: $" . $amount * $selectedCurrency->sellat . " CAD";
            } elseif ($selectedCurrency && $option == '0') {
                // $buyResult = $amount * $selectedCurrency->buyat;
                // $sellResult = $amount * $selectedCurrency->sellat;
                $x = "I will pay: $" . $amount * $selectedCurrency->buyat . " CAD";
            } else {
                $this->Flash->error(__('Invalid currency code selected2.'));
            }
        }

        // Pass the currencies and results to the view
        $this->set(compact('currencies', 'selectedCurrency', 'buyResult', 'sellResult', 'x'));
    }
}
