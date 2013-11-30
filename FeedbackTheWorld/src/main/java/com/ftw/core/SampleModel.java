package com.ftw.core;

import java.util.HashMap;

import javax.xml.bind.annotation.XmlRootElement;

@XmlRootElement
@SuppressWarnings("rawtypes")
public class SampleModel {
	private final static HashMap<Class, Integer> ids = new HashMap<Class, Integer>();
	private int id;
	
	public SampleModel() {
		
	}
	
	public SampleModel(Class c) {
		if(ids.containsKey(c)) {
			this.id = ids.get(c) + 1;
			ids.put(c, ids.get(c) + 1);
		} else {
			this.id = 0;
			ids.put(c, 0);
		}
	}

	/**
	 * @return the id
	 */
	public int getId() {
		return id;
	}

	/**
	 * @param id the id to set
	 */
	public void setId(int id) {
		this.id = id;
	}
}
