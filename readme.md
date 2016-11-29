# Consultas para obtener la lista de asistencia
Es una consulta compleja innecesariamente, tal vez porque estos jóvenes consideraron tablas poco indispensables.
```
SELECT 
    M.name as Turno,
	U.name as Asistente
FROM `milestone_user` MU 
JOIN `milestones` M ON MU.milestone_id = M.id
JOIN `users` U ON MU.user_id = U.id
WHERE `check`=1
```