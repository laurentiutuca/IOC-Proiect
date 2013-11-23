package com.ftw.core;

import java.sql.*;
import java.util.*;
import java.io.UnsupportedEncodingException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

import com.sun.jersey.core.util.Base64;

import sun.misc.BASE64Encoder;
import sun.misc.BASE64Decoder;

public class ServiceDatabase {
	// Database connection string
	static final String jdbcDriver = "com.mysql.jdbc.Driver";
	static final String dbURL = "jdbc:mysql://localhost/db_feedbacktheworld";

	// Database credentials
	static final String dbUser = "root";
	static final String dbPass = "miau";

	Connection conn = null;

	public ServiceDatabase() {
		try {
			Class.forName(jdbcDriver);
			// open database connection
			conn = DriverManager.getConnection(dbURL, dbUser, dbPass);
		} catch (SQLException se) {
			se.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
		}
	}

	public String getRight() {
		Statement stmt = null;
		String right = "";
		String sql = "";

		try {
			stmt = conn.createStatement();
			sql = "SELECT right_name FROM ftwrights;";
			ResultSet rs = stmt.executeQuery(sql);

			while (rs.next()) {
				System.out.println(rs.getString("right_name"));
			}
		} catch (SQLException se) {
			se.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
		}

		return right;
	}

	public boolean addRight(String rightName) {
		Boolean result = false;

		Statement stmt = null;
		String sql = "";

		try {
			stmt = conn.createStatement();
			sql = "INSERT into ftwrights(right_name) value('" + rightName
					+ "');";
			System.out.println(sql);
			stmt.executeUpdate(sql);

			result = true;
		} catch (SQLException se) {
			se.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
		}

		return result;
	}

	public boolean addUserType(String typeName, int typeMinrating,
			int typeMaxrating) {
		Boolean result = false;

		Statement stmt = null;
		String sql = "";

		try {
			stmt = conn.createStatement();
			sql = "INSERT into ftwtypes(type_name, type_minrating, type_maxrating) value('"
					+ typeName
					+ "', "
					+ typeMinrating
					+ ", "
					+ typeMaxrating
					+ ");";
			System.out.println(sql);
			stmt.executeUpdate(sql);

			result = true;
		} catch (SQLException se) {
			se.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
		}

		return result;
	}

	public List<String> getTypeList() {
		List<String> types = new ArrayList<String>();
		;

		Statement stmt = null;
		String sql = "";
		sql = "SELECT type_name FROM ftwtypes;";

		try {
			stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery(sql);

			while (rs.next()) {
				types.add(rs.getString("type_name"));
			}

		} catch (SQLException se) {
			se.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
		}

		return types;
	}

	public List<String> getType(String typeName) {
		List<String> type = new ArrayList<String>();

		Statement stmt = null;
		String sql = "";

		try {
			stmt = conn.createStatement();
			sql = "SELECT * FROM ftwtypes WHERE type_name='" + typeName + "';";
			ResultSet rs = stmt.executeQuery(sql);

			if (rs.next()) {
				type.add(rs.getString("type_name"));
				type.add(rs.getString("type_minrating").toString());
				type.add(rs.getString("type_maxrating").toString());
			}

		} catch (SQLException se) {
			se.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
		}

		return type;
	}

	private String encryptPassword(String passwordText) throws Exception {
		String passhash = "";
		passhash = new String((new BASE64Encoder()).encode(passwordText.getBytes()));
		
		return passhash;
	}
	
	private String decryptPassword(String passwordHash) throws Exception {
		String passtext = "";
		passtext = new String((new BASE64Decoder()).decodeBuffer(passwordHash));
		
		return passtext;
	}

	public boolean addUser(String username, String fullname, String email,
			String pass, String country, String address, int age) {
		Boolean result = false;

		Statement stmt = null;
		String sql = "";

		String passhash = "";
		try {
			passhash = encryptPassword(pass);
		} catch (Exception e1) {
			e1.printStackTrace();
		}
		
		sql = "INSERT into ftwusers(username, user_fullname, user_email, user_passwordhash, user_country, user_address, user_age, user_rating, user_typeid, user_lastlogin, user_sessions) value('"
				+ username + "', '" + fullname + "', '" + email + "', '" + passhash + "', '" + country + "', '" + address + "', " + age + ", 0, 1, 0, 0);";

		try {
			stmt = conn.createStatement();
			stmt.executeUpdate(sql);

			result = true;
		} catch (SQLException se) {
			se.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
		}

		return result;
	}
	
	public boolean checkUser (String username, String password) {
		Boolean result = false;
		
		Statement stmt = null;
		String sql = "";

		try {
			stmt = conn.createStatement();
			sql = "SELECT username, user_passwordhash FROM ftwusers WHERE username='" + username + "';";
			ResultSet rs = stmt.executeQuery(sql);

			if (rs.next()) {
				String passhash = rs.getString("user_passwordhash");
				String passwordtext = decryptPassword(passhash);
				if (password.equals(passwordtext)) {
					result = true;
				}
			}

		} catch (SQLException se) {
			se.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		} finally {
		}
		
		return result;
	}
}