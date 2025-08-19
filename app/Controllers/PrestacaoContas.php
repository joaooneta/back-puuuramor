<?php

namespace App\Controllers;

use App\Models\PrestacaoContasModel;

class PrestacaoContas extends BaseController
{
    protected $prestacaoContasModel;

    public function __construct()
    {
        $this->prestacaoContasModel = new PrestacaoContasModel();
    }
    public function index()
    {
        $prestacoes = $this->prestacaoContasModel->findAll();
        return view("prestacao-contas/index", ["prestacoes" => $prestacoes]);
    }

    // Lista todas as prestações
    public function list()
    {
        $prestacoes = $this->prestacaoContasModel->findAll();
        return view("prestacao-contas/list", ["prestacoes" => $prestacoes]);
    }

    // Mostra o formulário de cadastro
    public function create()
    {
        return view("prestacao-contas/form");
    }

    // Salva nova ou existente
    public function store()
    {
        helper(['form']);

        $id   = $this->request->getPost("id");
        $file = $this->request->getFile("img");

        $prestacaoAtual = $id ? $this->prestacaoContasModel->find($id) : null;

        $rules = [];
        if (!$id || ($file && $file->isValid() && !$file->hasMoved())) {
            $rules['img'] = 'uploaded[img]|is_image[img]|max_size[img,2048]';
        }

        if (!empty($rules) && !$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $imgName = $prestacaoAtual['img'] ?? null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imgName = $file->getRandomName();
            $file->move('uploads/prestacoes', $imgName);

            // Remove imagem antiga se existir
            if (!empty($prestacaoAtual['img'])) {
                $caminhoAntigo = FCPATH . 'uploads/prestacoes/' . $prestacaoAtual['img'];
                if (file_exists($caminhoAntigo)) {
                    unlink($caminhoAntigo);
                }
            }
        }

        $data = [
            'id'  => $id,
            'img' => $imgName,
        ];

        $this->prestacaoContasModel->save($data);

        return redirect()->to("/prestacao/listar")->with('sucesso', 'Prestação salva com sucesso!');
    }

    // Deleta uma prestação
    public function delete($id)
    {
        $prestacao = $this->prestacaoContasModel->find($id);

        if (!$prestacao) {
            return redirect()->to('/prestacao/listar')->with('erro', 'Prestação não encontrada.');
        }

        if (!empty($prestacao['img'])) {
            $caminhoImg = FCPATH . 'uploads/prestacoes/' . $prestacao['img'];
            if (file_exists($caminhoImg)) {
                unlink($caminhoImg);
            }
        }

        if ($this->prestacaoContasModel->delete($id)) {
            return redirect()->to("/prestacao/listar")->with('sucesso', 'Prestação deletada com sucesso!');
        } else {
            return redirect()->to("/prestacao/listar")->with('erro', 'Erro ao deletar a prestação.');
        }
    }
}
