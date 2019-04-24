select * from AspNetUsers

select * from AspNetUserRoles

select * from AspNetRoles


select * from gifts

--delete from AspNetUsers

select * from GiftDraws

select * from Orders

select * from GiftDrawUsers

select * from GiftDrawUserKeys

--delete from Orders

--delete from GiftDrawUsers

--delete from Orders

--update GiftDrawUserKeys set price = 100

select gd.id, sum(gduk.price) AS price from GiftDrawUserKeys gduk
JOIN GiftDrawUsers gdu ON gdu.Id = gduk.GiftDrawUserId
JOIN GiftDraws gd ON gd.id = gdu.GiftDrawId
group by gd.id



