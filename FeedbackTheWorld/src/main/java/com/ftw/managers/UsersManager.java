package com.ftw.managers;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import com.ftw.datamodel.UserInfo;
import com.ftw.interfaces.IManager;
import com.google.inject.Inject;
import com.google.inject.Singleton;

@Singleton
public class UsersManager implements IManager{
	
	Map<String, UserInfo> users;
	List<UserInfo> listOfUsers;
	
	@Inject
	public UsersManager() {
		this.users = new HashMap<String, UserInfo>();
		this.listOfUsers = new ArrayList<UserInfo>();
		samplePut();
	}
	
	private void samplePut() {
		UserInfo u1 = new UserInfo();
		u1.setFullname("Laurentiu Tuca");
		u1.setEmail("laurentiu.tuca@cti.pub.ro");
		UserInfo u2 = new UserInfo();
		u2.setFullname("Andrei Pavel");
		u2.setEmail("andrei.pavel@cti.pub.ro");
		UserInfo u3 = new UserInfo();
		u3.setFullname("Cristina Caciur");
		u3.setEmail("cristina.caciur@cti.pub.ro");
		UserInfo u4 = new UserInfo();
		u4.setFullname("Mihai Cepoi");
		u4.setEmail("mihai.cepoi@cti.pub.ro");
		addUser(u1);
		addUser(u2);
		addUser(u3);
		addUser(u4);
	}
	
	public void addUser(UserInfo user) {
		this.users.put(user.getEmail(), user);
		this.listOfUsers.add(user);
	}
	
	public List<UserInfo> getListOfUsers() {
		return this.listOfUsers;
	}
}
