import csv
from ctypes import *

class datos(Structure):
    _fields_ = [
        ('id',c_int),
        ('nombre',c_char_p),
        ('apellido',c_char_p),
        ('voto',c_int)
    ]

nombres=['oscar','armando','javier','luis','dani','manuel','seba','juan','carlos','vale']
apellidos=['sandoval','jimenez','inostroza','cid','perez','ramirez','larrain','saez','escobar','martinez']
da=datos()
datos2=[]

for i in range(10):
    datos2.append(da)
    da.id=i+1
    da.nombre=nombres[i]
    da.apellido=apellidos[i]
    da.voto=2
    datos2[i] =[da.id,da.nombre,da.apellido,da.voto]
    print datos2[i]
with open('salida.csv','wb') as f:
    writer= csv.writer(f,delimiter=';')
    writer.writerows(datos2)
