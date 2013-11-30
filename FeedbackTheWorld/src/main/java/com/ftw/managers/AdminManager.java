package com.ftw.managers;

import com.ftw.interfaces.IManager;
import com.google.inject.Inject;
import com.google.inject.Singleton;

@Singleton
public class AdminManager implements IManager{

	@Inject
	public AdminManager() {
	}
}
