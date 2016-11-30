# Consultas para obtener la lista de asistencia
Es una consulta compleja innecesariamente, tal vez porque estos jóvenes consideraron tablas poco indispensables.
```sql
SELECT 
    M.name as Turno,
	U.name as Asistente
FROM `milestone_user` MU 
JOIN `milestones` M ON MU.milestone_id = M.id
JOIN `users` U ON MU.user_id = U.id
WHERE `check`=1
```

Asistentes de la mañana
---
101 asistentes.

```sql
SELECT 
	U.name as Asistente,
	U.email as Email,
	U.celular as Celular,
	U.dni as DNI,
	U.universidad as Universidad,
	U.carrera as Carrera,
	U.ciclo as Ciclo,
	U.egresado as Egresado
FROM `milestone_user` MU 
JOIN `milestones` M ON MU.milestone_id = M.id
JOIN `users` U ON MU.user_id = U.id
WHERE `check`=1 AND M.id=6
ORDER BY U.name ASC
```

Asistentes de la tarde
---
72 asistentes.

```sql
SELECT 
	U.name as Asistente,
	U.email as Email,
	U.celular as Celular,
	U.dni as DNI,
	U.universidad as Universidad,
	U.carrera as Carrera,
	U.ciclo as Ciclo,
	U.egresado as Egresado
FROM `milestone_user` MU 
JOIN `milestones` M ON MU.milestone_id = M.id
JOIN `users` U ON MU.user_id = U.id
WHERE `check`=1 AND M.id=7
ORDER BY U.name ASC
```