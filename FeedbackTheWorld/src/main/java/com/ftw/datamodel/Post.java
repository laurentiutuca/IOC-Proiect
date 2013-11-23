package com.ftw.datamodel;

import javax.xml.bind.annotation.XmlRootElement;

@XmlRootElement
public class Post {
	private int id;
	private int articleid;
	private int authorid;
	private String body;
	private String date;
	private double rating;
	
	public Post() {
		this.id = 0;
		this.articleid = 0;
		this.authorid = 0;
		this.body = "";
		this.date = "";
		this.rating = 0;
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
	/**
	 * @return the articleid
	 */
	public int getArticleid() {
		return articleid;
	}
	/**
	 * @param articleid the articleid to set
	 */
	public void setArticleid(int articleid) {
		this.articleid = articleid;
	}
	/**
	 * @return the authorid
	 */
	public int getAuthorid() {
		return authorid;
	}
	/**
	 * @param authorid the authorid to set
	 */
	public void setAuthorid(int authorid) {
		this.authorid = authorid;
	}
	/**
	 * @return the body
	 */
	public String getBody() {
		return body;
	}
	/**
	 * @param body the body to set
	 */
	public void setBody(String body) {
		this.body = body;
	}
	/**
	 * @return the date
	 */
	public String getDate() {
		return date;
	}
	/**
	 * @param date the date to set
	 */
	public void setDate(String date) {
		this.date = date;
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
	
	
}
