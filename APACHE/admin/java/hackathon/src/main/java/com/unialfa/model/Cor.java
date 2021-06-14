package com.unialfa.model;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;

@Entity
public class Cor {
	
	public Integer getId() {
		return id;
	}

	public void setId(Integer id) {
		this.id = id;
	}


	public String getNomeCor() {
		return nomeCor;
	}

	public void setNomeCor(String nomeCor) {
		this.nomeCor = nomeCor;
	}


	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "idcor")
	private Integer id;
	
	@Column(name = "cor")
	private String nomeCor;
}
