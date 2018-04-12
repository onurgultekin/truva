#!/usr/bin/python
import time, select
# Import all from module socket
from socket import *
#Importing all from thread
from thread import *
 
# Defining server address and port
host = '0.0.0.0'  #'localhost' or '127.0.0.1' or '' are all same
port = 52000 #Use port > 1024, below it all are reserved

#Creating socket object
server_sock = socket()
#Binding socket to a address. bind() takes tuple of host and port.
server_sock.bind((host, port))
#Listening at the address
server_sock.listen(100) #5 denotes the number of clients can queue



def clientthread(conn,addr):
#infinite loop so that function do not terminate and thread do not end.

		status = True
		while True:
			conn.send("Hello connection %s\n" % addr[1])
			time.sleep(1)
			

			
			

if __name__ == "__main__":
	CONNECTION_LIST = []
	RECV_BUFFER = 4096
	
	CONNECTION_LIST.append(server_sock)
	while True:
		read_sockets,write_sockets,error_sockets = select.select(CONNECTION_LIST,[],[])

		for sock in read_sockets:
			#New connection
			if sock == server_sock:
				# Handle the case in which there is a new connection recieved through server_socket
				sockfd, addr = server_sock.accept()
				CONNECTION_LIST.append(sockfd)
				print "Client (%s, %s) connected" % addr
				 
				#broadcast_data(sockfd, "[%s:%s] entered room\n" % addr)
				start_new_thread(clientthread,(sockfd,addr,)) 
			#Some incoming message from a client
			else:
				# Data recieved from client, process it
				try:
					#In Windows, sometimes when a TCP program closes abruptly,
					# a "Connection reset by peer" exception will be thrown
					data = sock.recv(RECV_BUFFER)
					if data:
						print "data"
						#start_new_thread(clientthread,(sock,)) 
						#broadcast_data(sock, "\r" + '<' + str(sock.getpeername()) + '> ' + data)                
				 
				except:
					#broadcast_data(sock, "Client (%s, %s) is offline" % addr)
					print "Client (%s, %s) is offline" % addr
					sock.close()
					CONNECTION_LIST.remove(sock)
					continue

	 
	server_socket.close()
