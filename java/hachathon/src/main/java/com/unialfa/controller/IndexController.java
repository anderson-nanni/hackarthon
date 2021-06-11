package com.unialfa.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
public class IndexController {
	@RequestMapping("/")
	public String inicar(Model model) {
		
		model.addAttribute("titulo1","Cadastrar Veiculo");
		model.addAttribute("titulo2","Cadastrar Cor");
		model.addAttribute("titulo3","Cadastrar Marca");
		model.addAttribute("titulo4","Listar veiculos");
		model.addAttribute("titulo5","Listar marca");
		model.addAttribute("titulo6","Listar cor");
		
		return"index";
	}
}
