package com.ftw.datamodel;

import java.util.ArrayList;
import java.util.List;

import javax.xml.bind.annotation.XmlRootElement;

@XmlRootElement
public class Article {
	private int authorid;
	private String subject;
	private String body;
	private String review;
	private int rating;
	private String link;
	private String date;
	private int category;
	private List<Post> comentarii;
	
	public Article() {
		this.authorid = 0;
		this.subject = "";
		this.body = "";
		this.review = "";
		this.rating = 0;
		this.link = "";
		this.date = "";
		this.category = 0;
		this.comentarii = new ArrayList<Post>();
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
	 * @return the subject
	 */
	public String getSubject() {
		return subject;
	}
	/**
	 * @param subject the subject to set
	 */
	public void setSubject(String subject) {
		this.subject = subject;
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
	 * @return the review
	 */
	public String getReview() {
		return review;
	}
	/**
	 * @param review the review to set
	 */
	public void setReview(String review) {
		this.review = review;
	}
	/**
	 * @return the rating
	 */
	public int getRating() {
		return rating;
	}
	/**
	 * @param rating the rating to set
	 */
	public void setRating(int rating) {
		this.rating = rating;
	}
	/**
	 * @return the link
	 */
	public String getLink() {
		return link;
	}
	/**
	 * @param link the link to set
	 */
	public void setLink(String link) {
		this.link = link;
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
	 * @return the category
	 */
	public int getCategory() {
		return category;
	}
	/**
	 * @param category the category to set
	 */
	public void setCategory(int category) {
		this.category = category;
	}
	/**
	 * @return the comentarii
	 */
	public List<Post> getComentarii() {
		return comentarii;
	}
	/**
	 * @param comentarii the comentarii to set
	 */
	public void setComentarii(List<Post> comentarii) {
		this.comentarii = comentarii;
	}

	
}
