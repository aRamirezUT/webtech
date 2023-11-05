var hotel = {
    name:'LeStay',
    rooms: 40,
    booked: 25,
    gym: true,
    roomTypes:['twin','double','suite','deluxe'],
    checkAvailability:function(){
        return this.rooms - this.booked;
    },
    checkGym:function(){
        return this.gym;
    }
};