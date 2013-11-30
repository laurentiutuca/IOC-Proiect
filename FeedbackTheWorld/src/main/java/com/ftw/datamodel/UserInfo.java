package com.ftw.datamodel;

import javax.xml.bind.annotation.XmlRootElement;

import com.ftw.core.SampleModel;

@XmlRootElement
public class UserInfo extends SampleModel{
	private String username;
	private String password;
	private String fullname;
	private String address;
	private String email;
	private String country;
	private int age;
	private double rating;
	private UserType usertype;
	private String lastlogin;
	private int nosessions;
	
	public UserInfo() {
		super(UserInfo.class);
		this.username = "";
		this.password = "";
		this.fullname = "";
		this.address = "";
		this.email = "";
		this.country = "";
		this.age = 0;
		this.rating = 0;
		this.usertype = UserType.DEFAULT;
		this.lastlogin = "";
		this.nosessions = 0; 
	}
	
	/**
	 * @return the username
	 */
	public String getUsername() {
		return username;
	}
	/**
	 * @param username the username to set
	 */
	public void setUsername(String username) {
		this.username = username;
	}
	/**
	 * @return the password
	 */
	public String getPassword() {
		return password;
	}
	/**
	 * @param password the password to set
	 */
	public void setPassword(String password) {
		this.password = password;
	}
	/**
	 * @return the fullname
	 */
	public String getFullname() {
		return fullname;
	}
	/**
	 * @param fullname the fullname to set
	 */
	public void setFullname(String fullname) {
		this.fullname = fullname;
	}
	/**
	 * @return the address
	 */
	public String getAddress() {
		return address;
	}
	/**
	 * @param address the address to set
	 */
	public void setAddress(String address) {
		this.address = address;
	}
	/**
	 * @return the email
	 */
	public String getEmail() {
		return email;
	}
	/**
	 * @param email the email to set
	 */
	public void setEmail(String email) {
		this.email = email;
	}
	/**
	 * @return the country
	 */
	public String getCountry() {
		return country;
	}
	/**
	 * @param country the country to set
	 */
	public void setCountry(String country) {
		this.country = country;
	}
	/**
	 * @return the age
	 */
	public int getAge() {
		return age;
	}
	/**
	 * @param age the age to set
	 */
	public void setAge(int age) {
		this.age = age;
	}
	/**
	 * @return the rating
	 */
	public double getRating() {
		return rating;
	}
	/**
	 * @param rating the rating to set
	 */
	public void setRating(double rating) {
		this.rating = rating;
	}
	/**
	 * @return the usertype
	 */
	public UserType getUsertype() {
		return usertype;
	}
	/**
	 * @param usertype the usertype to set
	 */
	public void setUsertype(UserType usertype) {
		this.usertype = usertype;
	}
	/**
	 * @return the lastlogin
	 */
	public String getLastlogin() {
		return lastlogin;
	}
	/**
	 * @param lastlogin the lastlogin to set
	 */
	public void setLastlogin(String lastlogin) {
		this.lastlogin = lastlogin;
	}
	/**
	 * @return the nosession
	 */
	public int getNosessions() {
		return nosessions;
	}
	/**
	 * @param nosession the nosession to set
	 */
	public void setNosessions(int nosessions) {
		this.nosessions = nosessions;
	}
	
	

}
