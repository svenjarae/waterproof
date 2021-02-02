LOGIN ADMIN

superadministrator@app.com
password

SQL Dump:
endproject_20210120_1127CET.sql

FIXME:

1. In der App kann man Equipment inklusive Infos anlegen und dieses beim ausfüllen eines Serviceauftrags auswählen. Ich habe einen Admin bereich eingerichtet, in dem der Service-Auftrag vom jeweiligen Kunden angezeigt wird. Ich möchte zusätzlich die Infos des Equipments anzeigen, schaffe es aber nicht, die relationship über den Service-Auftrag zum jeweiligen Equipment auszurichten. In der Datenbank Service-Table wird bereits die equipment-id zum im service-auftrag ausgewählten equipment eingetragen. Ich kann jedoch im View nicht über $service->equipment-id daraufzugreifen. Wo ist mein Denkfehler bzw. Was habe ich vergessen?
- Relationship in den Models Service.php und Equipment.php
- AdminController und AdminAssignController.php 
- Ausgabe im View admin.assignments.show (single view des jeweiligen Serviceauftrags Zeile 46) 

2. Ich würde gerne das Equipment bzw. Auch die Serviceaufträge des jeweiligen Users zählen und wenn 0 Daten vorhanden sind einen Alternativtext ausgeben. Mir gehen die Ideen aus und die Zeit wird knapp :D! 
- Ausgabe im View equipment.index Zeile 39 bzw. Im View service.assignments Zeile 34

Außerdem möchte ich mit $loop->iteration oder $loop->count die Equipment Anzahl des jeweiligen Users durchzählen. Aktuell werden alle Equipment-Stücke in der Datenbank gezählt, obwohl ich in der foreach Schleife bin und die if Abfrage nach dem Auth:user zuvor schalte. 
- Ausgabe im View equipment.index Zeile 67

Hast du mir einen Tipp?

3. Ich berechne im EquipmentController je nach Differenz des aktuellen Datums und des maintenance Dates in der Equipment Table den status. In der Übersicht wird es im View ausgegeben aber ich schaffe es nicht, die Variablen $equipment->diff_in_days und $equipment->status in der single view und der Startseite verfügbar zu machen. Wie bekomme ich in anderen Views Zugriff auf die genannten Inhalte der Variablen? Ich kann leider nicht über die Datenbank gehen wie sonst… ist es generell unlogisch, dass ich die dynamischen Werte nicht einfach mit in die Datenbank eingetragen habe?
- EquipmentController Zeile 56
- Übersicht: equipment.index Zeile 70-83
- SingleView: equipment.show Zeile 29 und 41
- Startseite: home Zeile 110-115

DAAAANKEEEEEE!!!!!