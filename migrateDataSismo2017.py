import csv
import sqlalchemy
import logging
import traceback
import re
import os
from dateutil.parser import *
from sismo2017DBMapping import *
from sqlalchemy.orm import sessionmaker
from datetime import datetime

global numberRegex
numberRegex = re.compile(r'\d+', flags = re.IGNORECASE)


def fillInDatabase(file, session):
	"""Take the csv file and map it to the database"""

	header = None
	count = 0

	#Open the csv file
	with open(file, 'r') as csvfile:

		rowCount = 0
		readings = list()
		
		reader = csv.reader(csvfile)
		for row in reader:

			#skip header
			if rowCount == 0:
				rowCount = 1
				continue

			#skip blank rows
			temp = ''.join(row)
			if temp == '':
				continue

			nombre = row[1].replace('"', '').replace("'", "")
			necesidades = row[2].replace('"', '').replace("'", "")
			contacto = row[3].replace('"', '').replace("'", "")
			telefono = row[4].replace('"', '').replace("'", "")
			calle = row[6].replace('"', '').replace("'", "")
			numero = row[7].replace('"', '').replace("'", "")
			colonia = row[8].replace('"', '').replace("'", "")
			delegacion = row[9].replace('"', '').replace("'", "")
			zona = row[10].replace('"', '').replace("'", "")
			entidad = row[11].replace('"', '').replace("'", "")
			horario = row[12].replace('"', '').replace("'", "")
			tipo = row[13].replace('"', '').replace("'", "")
			urlMapa = row[14].replace('"', '').replace("'", "")

			ubicacion = calle + numero + colonia
			#print(row)
			#print(nombre)

			#Se trata de un centro de acopio
			if ubicacion != '':
				if nombre == '':
					nombre = 'Centro de Acopio' + str(rowCount)

				rowCount += 1
				#print(nombre)

				#Obtener lista de necesidades
				necesidadeslist1 = necesidades.split('.')

				for necesidades in necesidadeslist1:
					necesidadeslist2 = necesidades.split(',')

				#print(necesidadeslist2)

				articulos = list()
				for articulo in necesidadeslist2:
					art = Articulo(ca_id = rowCount, nombre = articulo, cantidad = -1, prioridad = 3, categoria = 'Miscelaneos')
					articulos.append(art)
					#print(art)

				if len(urlMapa) >= 255:
					urlMapa = ''

				ca = CentroAcopio(idCentro = rowCount, nombre = nombre, calle = calle, numero = numero, colonia = colonia, codigoPostal = None, zona = zona, entidad = entidad,
					delmpio = delegacion, telefono = telefono, contacto = contacto, horarios = horario, tipoCentro = tipo, urlMapa = urlMapa, articulos = articulos)

				print(ca)

				session.add(ca)

				session.commit()


	print("Finished migration " + file)
	logging.info("Finished migration " + file)


def main():
	"""Main function"""

	#Order of the function calls matters in this function, do not change it.

	file = "/Users/davidlaredorazo/Desktop/CentrosAcopio.csv"
	database = "mysql+mysqldb://dlaredorazo:@Dexsys13@localhost:3306/id2987913_sismo2017acopios"
	
	#set the logger config
	logging.basicConfig(filename='migrateData.log', level=logging.INFO,\
	format='%(levelname)s:%(threadName)s:%(asctime)s:%(filename)s:%(funcName)s:%(message)s', datefmt='%m/%d/%Y %H:%M:%S')

	logging.info("Started migrating from csv files")

	#Attempt connection to the database
	try:
		sqlengine = sqlalchemy.create_engine(database)
		Session = sessionmaker(bind=sqlengine)
		session = Session()

		print("Connection to " + database + " successfull")
		logging.info("Connection to " + database + " successfull")
	except Exception as e:
		logging.error("Error in connection to the database")
		logging.error(traceback.format_exc())
		print("Error in connection to the database")
		return False

	print("Migrating from csv files")
	logging.info("Migrating from csv files")
	fillInDatabase(file, session)

	session.close()

	logging.info("Finished migrating from csv files")


#invoke main
main()




