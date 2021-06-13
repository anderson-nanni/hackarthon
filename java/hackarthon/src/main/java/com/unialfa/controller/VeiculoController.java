package com.unialfa.controller;

import java.io.File;
import java.io.IOException;
import java.nio.file.Files;

import javax.websocket.server.PathParam;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.ResponseBody;
import org.springframework.web.multipart.MultipartFile;

import com.unialfa.repository.CorRepository;
import com.unialfa.repository.MarcaRepository;
import com.unialfa.repository.UsuarioRepository;
import com.unialfa.repository.VeiculoRepository;
import com.unialfa.service.FotoDestaqueService;
import com.unialfa.model.Marca;
import com.unialfa.model.Veiculo;

@Controller
@RequestMapping("/veiculo")
public class VeiculoController {
	
	@Autowired
	VeiculoRepository repoVeiculo;
	
	@Autowired
	MarcaRepository repoMarca;
	
	@Autowired
	CorRepository repoCor;
	
	@Autowired
	UsuarioRepository repoUsuario;
	
	@Autowired
	FotoDestaqueService fotoService;

	@GetMapping("/cadastrar")
	public String abrirFormulario(Veiculo veiculo, Model model){
		model.addAttribute("usuarios", repoUsuario.findAll());
		model.addAttribute("cores", repoCor.findAll());
		model.addAttribute("marcas", repoMarca.findAll());
		return "veiculo/formulario";
	}
	
	@RequestMapping("/listar")
	public String abrirLista(Model model, Marca marca) {
		
		model.addAttribute("veiculos",repoVeiculo.findAll());
		
		return "veiculo/lista";
	}
	
	@PostMapping("salvar")
	public String salvar(Veiculo veiculo, MultipartFile imagemFile) {
		fotoService.uploadFotoDestaque(imagemFile);
		veiculo.setFotoDestaque(fotoService.uploadFotoDestaque(imagemFile));
		
		repoVeiculo.save(veiculo);
		return "redirect:listar";
	}

	@PostMapping("editar/salvar")
	public String atualizar(Veiculo veiculo, MultipartFile imagemFile) {
		fotoService.uploadFotoDestaqueTarget(imagemFile);
		veiculo.setFotoDestaque(fotoService.uploadFotoDestaque(imagemFile));
		
		repoVeiculo.save(veiculo);
		return "redirect:../listar";
	}
	
	@GetMapping("/editar")
	public String editar(@PathParam(value = "id") Integer id, Model model) {
		Veiculo v = repoVeiculo.getById(id);
		model.addAttribute("veiculo", v);
		model.addAttribute("usuarios", repoUsuario.findAll());
		model.addAttribute("cores", repoCor.findAll());
		model.addAttribute("marcas", repoMarca.findAll());
		
		return "veiculo/formulario";
	}
	
	
	@GetMapping(value = "excluir")
	public String excluir(@PathParam(value = "id") Integer id) {
		repoVeiculo.deleteById(id);
		return "redirect:../listar";
	}
	
	@GetMapping("/img/{foto}")
	@ResponseBody
	public byte[] reenderizarImagem(@PathVariable("foto") String foto) throws IOException {
		try {
			File fotoArquivo = new File(fotoService.getUploadDir() + foto);
			return Files.readAllBytes(fotoArquivo.toPath());
		} catch (Exception e) {
			return null;
		}
	}

}
