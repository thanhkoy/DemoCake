<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Book Controller
 *
 * @property \App\Model\Table\BookTable $Book
 *
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $book = $this->paginate($this->Book);

        $this->set(compact('book'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Book->get($id, [
            'contain' => ['Category'],
        ]);

        $this->set('book', $book);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Book->newEmptyEntity();
        if ($this->request->is('post')) {
            $book = $this->Book->patchEntity($book, $this->request->getData());
            if ($this->Book->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $category = $this->Book->Category->find('list', ['limit' => 200]);
        $this->set(compact('book', 'category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Book->get($id, [
            'contain' => ['Category'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Book->patchEntity($book, $this->request->getData());
            if ($this->Book->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $category = $this->Book->Category->find('list', ['limit' => 200]);
        $this->set(compact('book', 'category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Book->get($id);
        if ($this->Book->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
