<?php

namespace App\Controllers;

use App\Models\ParceiroModel;

class Parceiro extends BaseController
{
    private $parceiroModel;

    public function __construct()
    {
        $this->parceiroModel = new ParceiroModel();
    }

    public function index()
    {
        $parceiros = $this->parceiroModel->findAll();
        return view("parceiro/index", ['parceiros' => $parceiros]);
    }

    public function listar()
    {
        $parceiros = $this->parceiroModel->findAll();
        return view("parceiro/list", ['parceiros' => $parceiros]);
    }

    public function create()
    {
        return view("parceiro/form");
    }

    public function store()
    {
        helper(['form']);

        $id = $this->request->getPost("id");
        $file = $this->request->getFile("logo");

        $parceiroAtual = $id ? $this->parceiroModel->find($id) : null;

        $rules = [
            'nome' => 'required|min_length[3]|max_length[100]',
            'link' => 'required|valid_url',
        ];

        if (!$id || ($file && $file->isValid() && !$file->hasMoved())) {
            $rules['logo'] = 'uploaded[logo]|is_image[logo]|max_size[logo,2048]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $logoName = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $logoName = $file->getRandomName();
            $file->move('uploads/parceiros', $logoName);

            if (!empty($parceiroAtual['logo'])) {
                $caminhoAntigo = FCPATH . 'uploads/parceiros/' . $parceiroAtual['logo'];
                if (file_exists($caminhoAntigo)) {
                    unlink($caminhoAntigo);
                }
            }
        }

        $data = [
            "id" => $id,
            "nome" => $this->request->getPost("nome"),
            "link" => $this->request->getPost("link"),
        ];

        if ($logoName) {
            $data["logo"] = $logoName;
        } elseif ($parceiroAtual) {
            $data["logo"] = $parceiroAtual['logo'];
        }

        $this->parceiroModel->save($data);

        return redirect()->to("/parceiro/list")->with('sucesso', 'Parceiro salvo com sucesso!');
    }

    public function edit($id)
    {
        $parceiro = $this->parceiroModel->find($id);

        if (!$parceiro) {
            return redirect()->to('/parceiro/list')->with('erro', 'Parceiro não encontrado.');
        }

        return view("parceiro/form", ['parceiro' => $parceiro]);
    }

    public function delete($id)
    {
        $parceiro = $this->parceiroModel->find($id);

        if (!$parceiro) {
            return redirect()->to('/parceiro/list')->with('erro', 'Parceiro não encontrado.');
        }

        if (!empty($parceiro['logo'])) {
            $caminhoLogo = FCPATH . 'uploads/parceiros/' . $parceiro['logo'];
            if (file_exists($caminhoLogo)) {
                unlink($caminhoLogo);
            }
        }

        if ($this->parceiroModel->delete($id)) {
            return redirect()->to("/parceiro/list")->with('sucesso', 'Parceiro deletado com sucesso!');
        } else {
            return redirect()->to("/parceiro/list")->with('erro', 'Erro ao deletar o parceiro.');
        }
    }
}
