# -*- coding: utf-8 -*- 
#Script Extracción de datos
#Metodo Scraping
#Autores
#Valentina Peña Diaz
#Carlos Sanhueza Ramirez
#Juan Gallardo Beltran
<<<<<<< Updated upstream
#Sebastian Martinez Sandoval
=======
>>>>>>> Stashed changes
#
#Profesor
#Julio Rojas-Mora
#
#Universidad Catolica de Temuco
#Temuco, Agosto de 2017
#Version 0.1 Preliminar

from bs4 import BeautifulSoup as BS
import requests
#Se pasara para efectos de prueba una pagina estatica, aca 
#se debe crear un ciclo que cambie el id de ASPX para obtener
#la mayor cantidad de data posible
<<<<<<< Updated upstream
url = "https://www.camara.cl/trabajamos/sala_votacion_detalle.aspx?prmId=1"


def extraccion(url):
	#Se hace la peticion a la pagina web
	req = requests.get(url)
	#Se crea la variable para la comparacion
	status_web = req.status_code
	#Definir como funcion el ciclo
	if status_web==200:
		print "Pagina Con Informacion" + url
		html = BS(req.text, "html.parser")
		#print html
		#Se recorre el HTML buscando la tabla 
		boletin = html.find('div',attrs={'id':'ctl00_mainPlaceHolder_pnlBoletin'})
		id_bol  = (boletin.text.encode('utf-8').strip())
		id_bol  = id_bol.split(" ")
		print id_bol[2]
		favor  	= html.find_all('table',attrs={'id':'ctl00_mainPlaceHolder_dtlAFavor'})
		print favor		
		contra 	= html.find_all('table',attrs={'id':'ctl00_mainPlaceHolder_dtlEncontra'})
		absten 	= html.find_all('table',attrs={'id':'ctl00_mainPlaceHolder_dtlAbstencion'})
		pareo  	= html.find_all('table',attrs={'id':'ctl00_mainPlaceHolder_dtlPareos'})
		for i, favor in enumerate(favor):
			fl = open('output.txt', 'w')
			fl.write(str("A favor\n"))
			cd = favor.text.replace("\n\r\n", "")
			fl.write(cd.encode('utf-8').strip())
			print "db.Boletin.insert({Codigo:'"+id_bol[2]+'", Diputado:"'+(cd.encode('utf-8').strip())+", A_favor:'1', En_contra:'0', Abstencion:'0'})"
			fl.write(str('\n'))	
			for j, contra in enumerate(contra):
				fl.write(str("En contra\n"))
				fl.write(contra.text.encode('utf-8').strip())
				fl.write(str('\n'))
				for k, absten in enumerate(absten):
					fl.write(str("Se Abstiene\n"))
					fl.write(absten.text.encode('utf-8').strip())
					fl.write(str('\n'))
					for l, pareo in enumerate(pareo):
						fl.write(str("Pareo\n"))
						fl.write(pareo.text.encode('utf-8').strip())
						fl.write(str('\n'))
	else:
		print "Error, status %d " % status_web
		pass

for i in range(100000):
	url2 = "https://www.camara.cl/trabajamos/sala_votacion_detalle.aspx?prmId=26172"
	#"https://www.camara.cl/trabajamos/sala_votacion_detalle.aspx?prmId="+`i` 	 
	valido = requests.get(url2)
	estado = valido.status_code
	if estado==200:
		pag = BS(valido.text, "html.parser")
		es = pag.find('div',attrs={'class':'content-head'})
		ti = (es.text.encode('utf-8').strip())
		a =  str(ti[10])
		if a=="T":
			print "Pagina en Mantencion"
		else:
			extraccion(url2)
	else:
		print "Pagina Invalida"
=======
url = "https://www.camara.cl/trabajamos/sala_votacion_detalle.aspx?prmId=26172"

#Se hace la peticion a la pagina web
req = requests.get(url)

#Se crea la variable para la comparacion
status_web = req.status_code


#Se hace la comprobacion
if status_web==200:
	print "Pagina Activa"
	html = BS(req.text, "html.parser")
	#print html
	#Se recorre el HTML buscando la tabla 
	favor  = html.find_all('table',attrs={'id':'ctl00_mainPlaceHolder_dtlAFavor'})
	contra = html.find_all('table',attrs={'id':'ctl00_mainPlaceHolder_dtlEncontra'})
	absten = html.find_all('table',attrs={'id':'ctl00_mainPlaceHolder_dtlAbstencion'})
	pareo  = html.find_all('table',attrs={'id':'ctl00_mainPlaceHolder_dtlPareos'})
	for i, favor in enumerate(favor):
		#data = favor.find_all('td')
		#data_2 = data.replace("\n\r\n", "")
		fl = open('output.html', 'w')
		fl.write(str("A favor"))
		fl.write(str(favor))
		for j, contra in enumerate(contra):
			fl.write(str("En contra"))
			fl.write(str(contra))
			for k, absten in enumerate(absten):
				fl.write(str("Se Abstiene"))
				fl.write(str(absten))
				for l, pareo in enumerate(pareo):
					fl.write(str("Pareo"))
					fl.write(str(pareo))
					fl.close()
else:
	print "Error, status %d " % status_web
>>>>>>> Stashed changes
