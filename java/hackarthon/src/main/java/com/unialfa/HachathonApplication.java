package com.unialfa;



import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

import com.unialfa.model.Cor;
import com.unialfa.model.Marca;
import com.unialfa.model.TipoVeiculo;
import com.unialfa.model.Usuario;
import com.unialfa.model.Veiculo;
import com.unialfa.repository.MarcaRepository;
import com.unialfa.repository.UsuarioRepository;
import com.unialfa.repository.VeiculoRepository;

@SpringBootApplication
public class HachathonApplication implements CommandLineRunner{
	
	@Autowired
	UsuarioRepository repository;
	
	public static void main(String[] args) {
		SpringApplication.run(HachathonApplication.class, args);
	}

	@Override
	public void run(String... args) throws Exception {
		// TODO Auto-generated method stub
	}

}
