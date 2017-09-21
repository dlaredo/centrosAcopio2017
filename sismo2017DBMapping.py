from sqlalchemy import Column, Integer, String, Table, DateTime, Float, Boolean, ForeignKey
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import relationship, backref, class_mapper

Base = declarative_base()


def copy_sqla_object(obj, omit_fk=True):
	"""Given an SQLAlchemy object, creates a new object (FOR WHICH THE OBJECT
	MUST SUPPORT CREATION USING __init__() WITH NO PARAMETERS), and copies
	across all attributes, omitting PKs, FKs (by default), and relationship
	attributes."""
	cls = type(obj)
	mapper = class_mapper(cls)
	newobj = cls()  # not: cls.__new__(cls)
	pk_keys = set([c.key for c in mapper.primary_key])
	rel_keys = set([c.key for c in mapper.relationships])
	prohibited = pk_keys | rel_keys
	if omit_fk:
		fk_keys = set([c.key for c in mapper.columns if c.foreign_keys])
		prohibited = prohibited | fk_keys
	for k in [p.key for p in mapper.iterate_properties if p.key not in prohibited]:
		try:
			value = getattr(obj, k)
			setattr(newobj, k, value)
		except AttributeError:
			pass
	return newobj
	


class CentroAcopio(Base):
	"""Class to map to the DataPoints table in the HVAC DB"""

	__tablename__ = 'centro_acopio'

	_idCentro = Column('id', Integer, primary_key = True, autoincrement = True)
	_nombre = Column('Nombre', String(255))
	_calle = Column('Calle', String(255))
	_numero = Column('Numero', Integer)
	_colonia = Column('Colonia', String(255))
	_codigoPostal = Column('CodigoPostal', Integer)
	_zona = Column('Zona', String(255))
	_delmpio = Column('Del_Mpio', String(255))
	_entidad = Column('Estado', String(255))
	_telefono = Column('Telefono', String(255))
	_contacto = Column('Contacto', String(255))
	_horarios = Column('Horarios', String(255))
	_tipoCentro = Column('TipoCentro', String(255))
	_urlMapa = Column('URLMapa', String(255))

	#PathMapping relationship
	_articulos = relationship("Articulo", back_populates = "_centroAcopio")

	#Constructor

	def __init__(self, idCentro = None, nombre = None, calle = None, numero = None, colonia = None, codigoPostal = None, zona = None, delmpio = None, entidad = None, 
		telefono = None, contacto = None, horarios = None, tipoCentro = None, urlMapa = None, articulos=[]):

		self._idCentro = idCentro
		self._nombre = nombre
		self._calle = calle
		self._numero = numero
		self._colonia = colonia
		self._codigoPostal = codigoPostal
		self._zona = zona
		self._entidad = entidad
		self._delmpio = delmpio
		self._telefono = telefono
		self._contacto = contacto
		self._horarios = horarios
		self._tipoCentro = tipoCentro
		self._urlMapa = urlMapa
		self._articulos = articulos

	#Properties

	@property
	def idCentro(self):
		return self._idCentro

	@idCentro.setter
	def idCentro(self, value):
		self._idCentro = value

	@property
	def nombre(self):
		return self._nombre

	@nombre.setter
	def nombre(self, value):
		self._nombre = value

	@property
	def calle(self):
		return self._calle

	@calle.setter
	def calle(self, value):
		self._calle = value

	@property
	def numero(self):
		return self._numero

	@numero.setter
	def numero(self, value):
		self._numero = value

	@property
	def colonia(self):
		return self._colonia

	@colonia.setter
	def colonia(self, value):
		self._colonia = value 

	@property
	def codigoPostal(self):
		return self._codigoPostal

	@codigoPostal.setter
	def codigoPostal(self, value):
		self._codigoPostal = value  

	@property
	def zona(self):
		return self._zona

	@zona.setter
	def zona(self, value):
		self._zona = value

	@property
	def entidad(self):
		return self._entidad

	@entidad.setter
	def entidad(self, value):
		self._entidad = value

	@property
	def delmpio(self):
		return self._delmpio

	@delmpio.setter
	def delmpio(self, value):
		self._delmpio = value

	@property
	def telefono(self):
		return self._telefono

	@telefono.setter
	def telefono(self, value):
		self._telefono = value

	@property
	def contacto(self):
		return self._contacto

	@contacto.setter
	def contacto(self, value):
		self._contacto = value 

	@property
	def horarios(self):
		return self._horarios

	@horarios.setter
	def horarios(self, value):
		self._horarios = value 

	@property
	def tipoCentro(self):
		return self._tipoCentro

	@tipoCentro.setter
	def tipoCentro(self, value):
		self._tipoCentro = value

	@property
	def urlMapa(self):
		return self._urlMapa

	@urlMapa.setter
	def urlMapa(self, value):
		self._urlMapa = value                 

	def __str__(self):
		return "<CentroAcopio(idCentro = '%s', nombre = '%s', calle = '%s', numero = '%s', colonia = '%s', codigoPostal = '%s', zona = '%s',\
		 delmpio = '%s', estado = '%s', telefono = '%s', contacto = '%s', horarios = '%s', mapa = '%s')>" \
		% (self._idCentro, self._nombre, self._calle, self._numero, self._colonia, self._codigoPostal, self._zona,\
		 self._delmpio, self._entidad, self._telefono, self._contacto, self._horarios, self._urlMapa)


class Articulo(Base):
	"""Class to map to the DataPoints table in the HVAC DB"""

	__tablename__ = 'articulos'

	_id = Column('id', Integer, primary_key = True, autoincrement = True)
	_ca_id = Column('centro_acopio_id', Integer, ForeignKey("centro_acopio.id"))
	_nombre = Column('Nombre', String(255))
	_cantidad = Column('Cantidad', Integer)
	_prioridad = Column('Prioridad', Integer)
	_categoria = Column('Categoria', String(255))

	#PathMapping relationship
	_centroAcopio = relationship("CentroAcopio", back_populates = "_articulos")

	#Constructor

	def __init__(self, ca_id, nombre, cantidad, prioridad, categoria, identifier=None):

		self._id = identifier
		self._ca_id = ca_id
		self._nombre = nombre
		self._cantidad = cantidad
		self._prioridad = prioridad
		self._categoria = categoria

	#Properties

	@property
	def id(self):
		return self._id

	@id.setter
	def id(self, value):
		self._id = value

	@property
	def ca_id(self):
		return self._ca_id

	@ca_id.setter
	def ca_id(self, value):
		self._ca_id = value

	@property
	def nombre(self):
		return self._nombre

	@nombre.setter
	def nombre(self, value):
		self._nombre = value

	@property
	def cantidad(self):
		return self._cantidad

	@cantidad.setter
	def cantidad(self, value):
		self._cantidad = value

	@property
	def prioridad(self):
		return self._prioridad

	@prioridad.setter
	def prioridad(self, value):
		self._prioridad = value

	@property
	def categoria(self):
		return self._categoria

	@categoria.setter
	def categoria(self, value):
		self._categoria = value  

	def __str__(self):
		return "<Articulo(id = '%s', ca_id = '%s', nombre = '%s', cantidad = '%s', prioridad = '%s', categoria = '%s')>" \
		% (self._id, self._ca_id, self._nombre, self._cantidad, self._prioridad, self._categoria)