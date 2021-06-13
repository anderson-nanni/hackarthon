package com.unialfa.controller;

import javax.websocket.server.PathParam;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.unialfa.model.Marca;
import com.unialfa.repository.MarcaRepository;

@Controller
@RequestMapping("/marca")
public class MarcaController {
	
	@Autowired
	MarcaRepository repo;
	
	@GetMapping("/cadastrar")
	public String abrirFormulario(Marca marca, Model model){
		return "marca/formulario";
	}
	
	@RequestMapping("/listar")
	public String abrirLista(Model model) {
		model.addAttribute("marcas",repo.findAll());
		return "marca/lista";
	}
	
	@PostMapping("salvar")
	public String salvar(Marca marca) {
		repo.save(marca);
		return "redirect:listar";
	}

	@PostMapping("editar/salvar")
	public String atualizar(Marca marca) {
		repo.save(marca);
		return "redirect:../listar";
	}
	
	
	@GetMapping(value = "editar")
	public String editar(@PathParam(value = "id") Integer id, Model model) {
		Marca marca = repo.getById(id);
		model.addAttribute("marca", marca);
		
		return "marca/formulario";
	}
	
	
	@GetMapping(value = "excluir")
	public String excluir(@PathParam(value = "id") Integer id) {
		repo.deleteById(id);
		return "redirect:../listar";
	}
}
