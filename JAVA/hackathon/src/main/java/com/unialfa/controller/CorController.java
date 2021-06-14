package com.unialfa.controller;

import javax.websocket.server.PathParam;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.unialfa.model.Cor;
import com.unialfa.repository.CorRepository;


@Controller
@RequestMapping("/cor")
public class CorController {
	
	@Autowired
	CorRepository repo;
	
	@GetMapping("/cadastrar")
	public String abrirFormulario(Cor cor, Model model){
		return "cor/formulario";
	}
	
	@RequestMapping("/listar")
	public String abrirLista(Model model) {
		model.addAttribute("cor",repo.findAll());
		return "cor/lista";
	}
	
	@PostMapping("salvar")
	public String salvar(Cor cor) {
		repo.save(cor);
		return "redirect:listar";
	}

	@PostMapping("editar/salvar")
	public String atualizar(Cor cor) {
		repo.save(cor);
		return "redirect:../listar";
	}
	
	
	@GetMapping(value = "editar")
	public String editar(@PathParam(value = "id") Integer id, Model model) {
		Cor cor = repo.getById(id);
		model.addAttribute("cor", cor);
		
		return "cor/formulario";
	}
	
	
	@GetMapping(value = "excluir")
	public String excluir(@PathParam(value = "id") Integer id) {
		repo.deleteById(id);
		return "redirect:../listar";
	}
}
